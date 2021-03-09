import os

current_path = os.path.dirname(os.path.realpath(__file__))
db_path = 'sqlite:///' + current_path + '//project.db'

class Config(object):
    SECRET_KEY = 'olegnizamov'
    DEBUG = True
    SQLALCHEMY_DATABASE_URI = db_path