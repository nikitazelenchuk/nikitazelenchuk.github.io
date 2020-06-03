#!/Applications/MAMP/Library/bin/python

hostname = 'localhost:8889'
username = 'root'
password = 'root'
database = 'curs'

import cgi, cgitb
import requests
import os
import mysql.connector

print("Content-type: text/html;charset=UTF-8\n")


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
            cur.execute("DELETE FROM color WHERE id = '" + form['id'].value + "'")
            myConnection.commit()
            myConnection.close()
            print("Row deleted successfully!<br>After 3 seconds this page will refresh!<meta http-equiv='refresh' content='3;URL=color_table.php'>")
    
    if (int)(form["check"].value) == 2:
        if ord(form["hex"].value) != 13 and ord(form["name"].value) != 13 and ord(form["rgb"].value) != 13 and (int)(form["id"].value) != -1:
            myConnection = mysql.connector.connect(host=hostname, user=username, passwd=password, db=database)
            cur = myConnection.cursor()
            cur.execute("INSERT INTO color (id, name, hex, rgb) VALUES (" + form["id"].value + ", '" + form["name"].value + "'," + form["hex"].value + form["rgb"].value + ")")
            myConnection.commit()
            myConnection.close()
            print("Data insert successfully!<br>After 3 seconds this page will refresh!<meta http-equiv='refresh' content='3;URL=color_table.php'>")
        else:
            print("Type HEX or/and Name or/and RGB or/and Id field!!!!")
    
    if (int)(form["check"].value) == 3:
        if (int)(form["id"].value) == -1:
            print("Type Id field!!!!")
        else:
            if (int)(form["code"].value) == -1 and ord(form["name"].value) == 13:
                print("You don't type one of the field to update!")
            else:
                myConnection = mysql.connector.connect(host=hostname, user=username, passwd=password, db=database)
                cur = myConnection.cursor()
                if ord(form["name"].value) != 13:
                    cur.execute("UPDATE color SET symbol='" + form["name"].value + "' WHERE id = '" + form["id"].value + "'")
                    myConnection.commit()
                
                if ord(form["hex"].value) != 13:
                    cur.execute("UPDATE color SET code='" + form["code"].value + "' WHERE id = '" + form["id"].value + "'")
                    myConnection.commit()
                
                myConnection.close()
                print("Data update successfully!<br>After 3 seconds this page will refresh!<meta http-equiv='refresh' content='3;URL=color_table.php'>")
