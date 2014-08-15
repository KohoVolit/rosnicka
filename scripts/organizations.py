'''creates organizations from API
see organization-example.json
'''

import vpapi
import json

vpapi.parliament("cz/psp")

organizations = {}
next = True
page = 1
while next:
    orgs = vpapi.get("organizations",where={"classification": "political group"},page=page)
    for org in orgs["_items"]:
        organizations[org["id"]] = {"id": org["id"], "name": org["name"]}
    page = page + 1
    try:
        orgs["_links"]["next"]
    except:
        next = False
        
with open("../www/json/organizations.json", "w") as outfile:
    json.dump(organizations,outfile)
