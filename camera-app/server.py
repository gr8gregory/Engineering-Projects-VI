import socket
from socket import error as SocketError
import time
import json
import face_encoding
import cv2 as cv
import numpy as np
import face_recognition
import cProfile
import re

encoding = 'utf-8'
HOST = '0.0.0.0'  # Standard loopback interface address (localhost)
PORT = 65432        # Port to listen on (non-privileged ports are > 1023)
MESSAGE = "PNG received processing image"
count = 0
loop = 0
total = 0
sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
sock.bind((HOST, PORT))
sock.listen()

class NumpyEncoder(json.JSONEncoder):
    """ Special json encoder for numpy types """
    def default(self, obj):
        if isinstance(obj, (np.int_, np.intc, np.intp, np.int8,
                            np.int16, np.int32, np.int64, np.uint8,
                            np.uint16, np.uint32, np.uint64)):
            return int(obj)
        elif isinstance(obj, (np.float_, np.float16, np.float32,
                              np.float64)):
            return float(obj)
        elif isinstance(obj, (np.ndarray,)):
            return obj.tolist()
        return json.JSONEncoder.default(self, obj)

print("Program has started!")


    
while True:  
    
    

    if(count == 0):
        
        file = open(f"image{loop}.png", "wb")
        file.close()
        #accept the connection in the infinite loop
        conn, addr = sock.accept()

        #try to read from the client
        try:
            data = conn.recv(2048)
        except ConnectionResetError:
                print("This is not the error we are looking for")

        #check if this is the first message from the client
        
        print("reached the code")
        string  = data.decode(encoding)

        id1 = string.find("###L") + len("###L")
        id2 = string.find("X")
        if((id1 != -1 ) and (id2 != -1)):

            numLen = id2 - id1
            num = int(data[id1:id2])
            total = num
            #Decode the length of the incoming transmission
            print("The total length of the message is", total)
            
            try:
                response = conn.send(str.encode("Length was recieved"))
            except ConnectionResetError:
                print("The connection was reset")
        count = 1
    else:
        #If we have already recived the first message from the client
        #Wait for the 2nd Message
        conn,addr = sock.accept()
        
        read = 0

        #Once connected begin reading the specified data from the client
        file = open(f"image{loop}.png", "ab")

        while read < total:
            
            try:
                data = conn.recv(2048)
            except ConnectionResetError:
                print("This is not the error we are looking for")
        
            read += len(data) 
            #string = data.decode("utf-8")
            #Write the data to the image file
            file.write(data)



        file.close()
        print("Revieved the Image is correctly!")
        
        face =  cv.imread(f"image{loop}.png")
        f_encoding = face_encoding.get_face_encoding(face,1)
        
        if f_encoding == -1:
            #No Faces where detected in the image
            
            #Send the website an error condition 
            message = f"#X1"
            try:
                conn.sendall(str.encode(message))
            except ConnectionResetError:
                print("Recieved Connection reset error")
            
        elif f_encoding == -2:
            #Multiple Faces where detected in the image
            message = f"#X2"
            try:
                conn.sendall(str.encode(message))
            except ConnectionResetError:
                print("Recieved Connection reset error")
            
        else:
            #If only face, send back the facial encodings            
            message =  str.encode(json.dumps(f_encoding, cls=NumpyEncoder))            
            try:
                conn.sendall(message)
            except ConnectionResetError:
                print("Recieved Connection reset error")
                
  
            
        count = 0
        loop += 1

        
        
                    
        
