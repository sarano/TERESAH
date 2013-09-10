#!/usr/bin/env python
# -*- coding: utf-8 -*-





#Key for Bamboo :
#[u'status', u'costbracket', u'name', u'license', u'tags', u'webpage', u'description', u'platform', u'cost', u'dependson', u'page', u'categories', u'developer']










import json
import io
import index

######################################
#
#
#			SIDE FUNCTION
#
#
######################################

def F2Json(path):	#We need the object which has been translated to json in index.py
	f = io.open(path, "rt", encoding="utf-8")
	j = f.read()
	f.close()
	
	return json.loads(j)

def prs(str):
	if not str is None:
		if "'" in str:
			str = str.replace("'", "\\'")
		return str
	else:
		return u""

def O2SQL(obj):
	s = ""
	for req in obj:
		v = obj[req]
		s += req.replace("#id#", str(v)) + " \n"
	return unicode(s)
#######################################
#
#
#			CORE FUNCTIONS
#
#
#######################################	
	
def createInsert(obj, host, key, request):
	host = "Dasish"
	if not key in obj[host]:
		obj[host][key] = {};
		
	id = False
	if request.count(u"#id#") >= 1:
		id = len(obj[host][key]) + 1
		#request = request.replace(u"#id#", str(id))
	
	if request in obj[host][key]:
		id = obj[host][key][request]
	else:
		obj[host][key][request] = id
	
	return obj, id

def getRequest(t, i, v, h, k): # table, tool_uid, value, host, host key
	#uri :
	uri = srcURI["URI"][h] + srcURI[h][k]
	req = False
	add = False
	
	if t == "Keyword":
		req = "INSERT INTO Keyword VALUES (#id#, '"+v+"', '"+uri+"', '"+k+"');"
		
	elif t == "Tool_type":
		req = "INSERT INTO Tool_type VALUES ('"+v+"', '"+uri+"');"
		
	elif t == "Platform":
		v = OS[v]
		req = "INSERT INTO Platform VALUES ('"+v+"');"
		
	elif t == "Developer":
		req = "INSERT INTO Developer VALUES (#id#, '"+v+"', NULL);"
		
	elif t == "registryDescription":
		if v:
			req = "INSERT INTO External_Description ("+str(i)+", '"+v+"', '"+uri+"')"
		else:
			pass
			
	elif t == "":
		pass
		
	elif t == k:
		add = v
		
	elif t == "Licence":
		req = "INSERT INTO Licence (#id#, '"+v+"', NULL, 'Unknown');"
		add = "#id#"
		
	else:
		pass
		
	return req , add

#createConnection(tmp["id"], conv["BambooDirt"][key], id, el, "BambooDirt", ins)
def createConnection(u, t, i, v, h, o): # uid, table, element_id, element_value, host, object
	#uri :
	req = False
	
	if t == "Keyword":
		key = "Tool_has_Keyword"
		req = "INSERT INTO Tool_has_Keyword VALUES ("+u+", '"+str(i)+"');"
		
	elif t == "Tool_type":
		key = "Tool_has_Tool_type"
		req = "INSERT INTO Tool_has_Tool_type VALUES ('"+u+"', '"+v+"');"
		
		
	elif t == "Platform":
		key = "Tool_has_Platform"
		v = OS[v]
		req = "INSERT INTO Tool_has_Platform VALUES ('"+u+"', '"+v+"');"
		
	elif t == "Developer":
		key = "Tool_has_Developer"
		req = "INSERT INTO Tool_has_Developer VALUES ('"+u+"', '"+str(i)+"');"
		
	elif t == "registryDescription":
		pass
		"""
		key = "Tool_has_External_Description"
		req = "INSERT INTO Tool_has_External_Description VALUES ('"+u+"', '"+str(i)+"');"
		"""
	elif t == "":
		pass
		
	elif t == "Licence":
		
		#str = "INSERT INTO Licence (#id#, '"+v+"', NULL, 'Unknown');"
		pass
	else:
		pass
	
	if req:
		o, id = createInsert(o, "Dasish", key, req)
	return o

def mainDescription(u, o):
	# User(UID=0) = BOT
	r = "INSERT INTO Description ('', '"
	
	if "name" in o:
		r += o["name"]
		
	r += "', '&nbsp;', '', '"#description, version
	
	if "webpage" in o:
		r += o["webpage"]
	else:
		r += "Unknown"
		
	r += "', CURDATE(), NULL, "#registered, registered_by
	
	if "licence" in o:
		r += str(o["licence"])
	else:
		r += "0"
		
	r += ", " + u + ", 0);"
	
	
		#
	#NAME', '\n', '', 'HOMEPAGE', REGISTERED, REGISTERED_BY, Licence_UID, TOOL_UID, USER_UID);"
	return r
	
def filterObject(data):#We need to
	s = set()
	ins = { "BambooDirt" : {}, "ArtsHumanities" : {}, "Dasish" : { "Tool" : {}, "Description" : {} }}
	
	ids = {} # ids[Bamboo][License] = 1
	
	#UID systems
	UID = ["license"]
	
	#Dictionnary for the conversion from host table to DASISH Table
	conv = F2Json("./source/sourceTable.json")
	
	
	
	for element in data:
		tmp = data[element]
		
		##
		#		We insert the tool
		##
		
		ins["Dasish"]["Tool"]["INSERT INTO Tool VALUES (" + str(tmp["id"]) + " , '" + prs(tmp["shortname"]) + "');"] = tmp["id"]
		
		###
		#		We get every data we have from every host
		###
		desc = {}
		for host in tmp:
		
			if host in conv:
			
				for key in tmp[host]:
					for el in tmp[host][key]:
						r, add = getRequest(conv[host][key], str(tmp["id"]), prs(el), host, key)
						
						#If we actually use it :
						if r:
							ins, id = createInsert (ins, host, conv[host][key], r)
							if add:
								kkey = conv[host][key]
								kkey = kkey.lower()
								desc[kkey] = prs(add.replace("#id#", str(id)))
							
							#We need to create the connection
							ins = createConnection(str(tmp["id"]), conv[host][key], id, prs(el), host, ins)
						else:
							if add:
								kkey = conv[host][key]
								kkey = kkey.lower()
								desc[kkey] = prs(add)
				
		ins["Dasish"]["Description"][mainDescription(str(tmp["id"]), desc)] = True
	return ins, s

	
def mergeSQL(obj, path):
	file = io.open(path, "wt", encoding="utf-8")
	obj = obj["Dasish"]
	
	##
	#
	#	Standalone Data
	#
	##
	file.write(O2SQL(obj["Tool"]))
	print "Tool written"
	
	file.write(O2SQL(obj["Keyword"]))
	print "Keyword written"
	
	file.write(O2SQL(obj["Licence"]))
	print "Licence written"
	
	file.write(O2SQL(obj["Platform"]))
	print "Platform written"
	
	file.write(O2SQL(obj["Developer"]))
	print "Developer written"
	
	file.write(O2SQL(obj["Tool_type"]))
	print "Tool_type written"
	
	##
	#
	#	Connected Data
	#
	##
	file.write(O2SQL(obj["Tool_has_Keyword"]))
	print "Tool_has_Keyword written"
	
	file.write(O2SQL(obj["Tool_has_Platform"]))
	print "Tool_has_Platform written"
	
	print O2SQL(obj["Tool_has_Developer"])
	file.write(O2SQL(obj["Tool_has_Developer"]))
	print "Tool_has_Developer written"
	
	file.write(O2SQL(obj["Tool_has_Tool_type"]))
	print "Tool_has_Tool_type written"
	
	file.write(O2SQL(obj["registryDescription"]))
	print "registryDescription written"
	
	
	
	file.close()


######################################
#
#
#			EXECUTION
#
#
######################################

srcURI = F2Json("./source/sourceUri.json")
OS = F2Json("./source/ossize.json")
data = F2Json("./tests/export.json")

data, s = filterObject(data)

index.turnToJson(data, "./tests/sql.json")

mergeSQL(data, "./tests/insert.sql")
print s
