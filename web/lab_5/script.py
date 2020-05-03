#!C:\Users\256nikita\AppData\Local\Programs\Python\Python38-32\python.exe

import cgi, cgitb
import requests
import os
import http.cookies

# счетчик количества запусков теста клиентом
# получаем значение из сookie и увеличиваем его на 1
cookie = http.cookies.SimpleCookie(os.environ.get("HTTP_COOKIE"))
number = cookie.get("Number")
if number is None:
    print("Set-cookie: Number=1")
    print("Content-type: text/html\n")
    print("Вы запускали тест 1 раз.<br><br>")
else:
	print("Set-cookie: Number=", (int)(number.value) + 1)
	print("Content-type: text/html\n")
	print("Вы запускали тест", (int)(number.value) + 1, "раз.<br><br>")

# подсчет количества прохождений теста на сервере
if os.stat('result.txt').st_size == 0:
	# если файл оказывается пустым, то пишем, что тест проходили один раз
	f = open('result.txt', 'w')
	f.write('1')
	print("Всего тест запускали 1 раз.<br><br>")
else:
	# если файл не пуст, то cчитываем значение и записываем увеличенное на 1
	f = open('result.txt', 'r')
	for line in f:
		line
	f = open('result.txt', 'w')
	f.write((str)((int)(line) + 1))
	print("Всего тест запускали ", (int)(line) + 1, " раз.<br><br>")

# получаем все данные из GET/POST запроса
form = cgi.FieldStorage()

rightAnswer = ["q2", "q6", "q10", "q11", "q15"]
answers = [0, 0, 0, 0, 0]

# формирование массива правильных ответов
if form["question1"].value == rightAnswer[0]:
    answers[0] = 1
    
if form["question2"].value == rightAnswer[1]:
    answers[1] = 1
    
if form["question3"].value == rightAnswer[2]:
    answers[2] = 1
    
if form["question4"].value == rightAnswer[3]:
    answers[3] = 1

if form["question5"].value == rightAnswer[4]:
    answers[4] = 1


# проверка количества правильных ответов
rightNumber = 0
for i in range(5):
	if answers[i] == 1:
		rightNumber = rightNumber + 1
		print("Вы ответили на вопрос № ", i+1, " ПРАВИЛЬНО.<br>")
	else: print("Вы ответили на вопрос № ", i+1, " НЕ ПРАВИЛЬНО.<br>")

print ("<html><head><title>Результаты тестирования</title></head><body>")
print ("<p> Колическтво правильных ответов: ", rightNumber, "</p>")
print ("<p> Процент правильных ответов: ", round(rightNumber/5*100), "%</p>")
print ("</body></html>")
