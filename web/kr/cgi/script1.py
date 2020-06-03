#!/Applications/MAMP/Library/bin/python

hostname = 'localhost:8889'
username = 'root'
password = 'root'
database = 'curs'

import cgi, cgitb
import requests
import os
import mysql.connector

print("Content-type: text/html; charset=UTF-8\n")

# получаем все данные из GET/Post запроса
form = cgi.FieldStorage()

if form.getfirst("check") is None:
	print("Chek radio button!!!!")
else:
	if (int)(form["check"].value) == 1:
		if (int)(form["id"].value) == -1:
			print("Type Id field!!!!")
		else:
			myConnection = mysql.connector.connect(host=hostname, user=username, passwd=password, db=database)
			cur = myConnection.cursor()
			cur.execute("DELETE FROM information WHERE id = '" + form['id'].value + "'")
			myConnection.commit()
			myConnection.close()
			print("Row deleted successfully!<br>After 3 seconds this page will refresh!<meta http-equiv='refresh' content='3;URL=ascii_table.php'>")

	if (int)(form["check"].value) == 2:
		if ord(form["text"].value) != 13 and ord(form["theme"].value) != 13 and (int)(form["id"].value) != -1:
			myConnection = mysql.connector.connect(host=hostname, user=username, passwd=password, db=database)
			cur = myConnection.cursor()
			cur.execute("INSERT INTO information (id, theme, text) VALUES (" + form["id"].value + ", '" + form["theme"].value + "'," + form["text"].value + ")")
			myConnection.commit()
			myConnection.close()
			print("Data insert successfully!<br>After 3 seconds this page will refresh!<meta http-equiv='refresh' content='3;URL=information_table.php'>")
		else:
			print("Type text or/and theme or/and Id field!!!!")

	if (int)(form["check"].value) == 3:
		if (int)(form["id"].value) == -1:
			print("Type Id field!!!!")
		else:
			if ord(form["text"].value) == 13 and ord(form["theme"].value) == 13:
				print("You don't type one of the field to update!")
			else:
				myConnection = mysql.connector.connect(host=hostname, user=username, passwd=password, db=database)
				cur = myConnection.cursor()
				if ord(form["theme"].value) != 13:
					cur.execute("UPDATE information SET theme='" + form["theme"].value + "' WHERE id = '" + form["id"].value + "'")
					myConnection.commit()

				if (int)(form["text"].value) != 13:
					cur.execute("UPDATE information SET text='" + form["text"].value + "' WHERE id = '" + form["id"].value + "'")
					myConnection.commit()

				myConnection.close()
				print("Data update successfully!<br>After 3 seconds this page will refresh!<meta http-equiv='refresh' content='3;URL=information_table.php'>")
