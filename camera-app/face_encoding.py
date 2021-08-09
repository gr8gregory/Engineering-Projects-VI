import cv2
import dlib as db
import face_recognition
import face_recognition_models
import numpy as np

cnn_face_detection_model = face_recognition_models.cnn_face_detector_model_location()
cnn_face_detection = db.cnn_face_detection_model_v1(cnn_face_detection_model)
predictor_68_point_model = face_recognition_models.pose_predictor_model_location()
pose_predictor_68_point = db.shape_predictor(predictor_68_point_model)
face_recognition_model = face_recognition_models.face_recognition_model_location()
face_encoder = db.face_recognition_model_v1(face_recognition_model)






def _rect_to_css(rect):
    """
    Convert a dlib 'rect' object to a plain tuple in (top, right, bottom, left) order

    :param rect: a dlib 'rect' object
    :return: a plain tuple representation of the rect in (top, right, bottom, left) order
    """
    return rect.top(), rect.right(), rect.bottom(), rect.left()

def _css_to_rect(css):
    """
    Convert a tuple in (top, right, bottom, left) order to a dlib `rect` object

    :param css:  plain tuple representation of the rect in (top, right, bottom, left) order
    :return: a dlib `rect` object
    """
    return db.rectangle(css[3], css[0], css[1], css[2])


def _trim_css_to_bounds(css, image_shape):
    """
    Make sure a tuple in (top, right, bottom, left) order is within the bounds of the image.

    :param css:  plain tuple representation of the rect in (top, right, bottom, left) order
    :param image_shape: numpy shape of the image array
    :return: a trimmed plain tuple representation of the rect in (top, right, bottom, left) order
    """
    return max(css[0], 0), min(css[1], image_shape[1]), min(css[2], image_shape[0]), max(css[3], 0)

def get_face_locaitons (img, upsample):
    return [face.rect for face in cnn_face_detection(img, upsample)]

def get_face_landmarks(face_image, face_locations):

    pose_predictor = pose_predictor_68_point
    return [ pose_predictor(face_image, face_locations) ]


def get_face_encoding(img, jitter):


    frame = cv2.resize(img, (0, 0), fx=1.0, fy=1.0)
    faces_locations = get_face_locaitons(frame, 1)
    
    if not faces_locations :
        print("No Faces Detected in Image")
        return -1
    elif len(faces_locations) > 1:
        print("Muliple faces detected")
        return -2
        
        
    print(faces_locations)

    for faces in faces_locations:
        landmarks = get_face_landmarks(frame, faces)


    return [np.array(face_encoder.compute_face_descriptor(frame, landmark_set, jitter)) for landmark_set
    in landmarks]

def image_capture():
    cap = cv2.VideoCapture(0)

    while True:
        ret, frame = cap.read()
        dimensions = frame.shape
        height  = frame.shape[0]
        width = frame.shape[1]
        rec_width = width/4
        rec_height = height/16

        pt1 = (int(width - (rec_width*3)), int(height - (rec_height*2)))
        pt2 = (int(width - rec_width), int(height - 20))
        print(frame.shape)
        print(pt1)
        print(pt2)



        cv2.rectangle(frame, pt1,pt2,(255,0,0), -1)
        cv2.imshow("Frame", frame)

        if cv2.waitKey(1) == ord('q'):
            cap.release()
            cv2.destroyAllWindows()
            break


