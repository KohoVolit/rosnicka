'''creates people from API
see people-example.json
'''

import vpapi
import json

vpapi.parliament("cz/psp")

people = {}
next = True
page = 1
while next:
    peo = vpapi.get("people",page=page)
    for p in peo["_items"]:
        people[p["id"]] = {
            "id": p["id"],
            "name": p["name"],
            "birth_date": p['birth_date'],
            "gender": p["gender"],
            "sort_name": p["sort_name"],
            "given_name": p["given_name"],
            "identifiers": p["identifiers"],
            "family_name": p["family_name"]
        }
        try:
            p["honorific_prefix"]
        except:
            nothing = None
        else:
            people[p["id"]]["honorific_prefix"] = p["honorific_prefix"]
        try:
            p["honorific_suffix"]
        except:
            nothing = None
        else:
            people[p["id"]]["honorific_suffix"] = p["honorific_suffix"]
           
    page = page + 1
    try:
        peo["_links"]["next"]
    except:
        next = False

with open("../www/json/people.json", "w") as outfile:
    json.dump(people,outfile)
