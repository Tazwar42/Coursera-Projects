#!/usr/bin/python3
import random
import datetime

print('Content-type:text/html\n')
print('<!DOCTYPE html>')

print(' <link rel = "stylesheet" type = "text/css" href = "../style/style.css">')

print('<div class ="content">')
print('<h1> These are your random numbers at this date and time<br/>'+ str(datetime.datetime.now())+ '</h1>')

for i in range(10):
    print('<p> Random #' +
    str(i+1) + ':'+str(random.randrange(0,1000))+'<p>')

print('<p> <a href="/"> Home Page</a></p>')
print('</div>')