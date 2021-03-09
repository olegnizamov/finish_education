# coding: utf-8

from flask import Flask
from config import Config


app = Flask(__name__)
app.config.from_object(Config)

app.debug = True

from app import routes