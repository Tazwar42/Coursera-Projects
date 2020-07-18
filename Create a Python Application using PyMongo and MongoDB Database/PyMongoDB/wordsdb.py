import pymongo as pm
import datetime

#read from csv 
fh = open("Vocabulary_set.csv","r")
wd_list = fh.readlines()

wd_list.pop(0)

vocab_list = []

#copy from csv to dict
for rawstring in wd_list:
    word, definition = rawstring.split(',',1)
    definition = definition.rstrip()
    vocab_list.append({'word':word, 'definition': definition})

#print(vocab_list)

#mongo db connection
client = pm.MongoClient("mongodb://localhost:27017/")
db = client["vocab"]

dbs = client.list_database_names()

vocab_col = db["vocab_list"]
vocab_col.drop()

vocab_dict = {'word':'cryptic','definition':'secret with hidden meaning'}
#pushing data
res = vocab_col.insert_one(vocab_dict)
print("inserted_id: ", res.inserted_id)
#check if db exists
if "vocab" in dbs:
    print("Database Exists")
res = vocab_col.insert_many(vocab_list)
#print(res.inserted_ids)
data = vocab_col.find_one()
#print(data)
#print data without id and definition column
for data in vocab_col.find({}, {"_id":0, "definition":0}):
    print(data)
data = vocab_col.find_one({'word':'boisterous'})
print(data)

#print(data)
#update one data
updt = vocab_col.update_one({'word':'boisterous'},
 {"$set":{"definition": "rowdy; noisy"}})
print("modified count: ", updt.modified_count)

data = vocab_col.find_one({'word':'boisterous'})
print(data)
#update man data
updt = vocab_col.update_many({},{"$set":{"last_updated UTC:":
datetime.datetime.utcnow().strftime('%Y-%m-%d%H%M%SZ')}})
print("modified_count:", updt.modified_count)