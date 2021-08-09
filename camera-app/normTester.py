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
import itertools as IT
import math
sum = 1

face1 = cv.imread("image1.png")
face2 = cv.imread("image2.png")

enc1 = face_encoding.get_face_encoding(face1,1)
enc2 = face_encoding.get_face_encoding(face2,1)

print( list(np.linalg.norm(np.array(enc1) - np.array(enc2), axis=1)))


enc1 = np.array(enc1)
enc2 = np.array(enc2)
out = enc1 - enc2
print(out)
 
sub = np.subtract(enc1,enc2)
print(sub)

square = np.square(sub)
ans= np.sum(square)

dt = math.sqrt(ans)
print(dt)
    
    
    
    

                    
        
