'''creates parties from API
see party-example.json
partly manually
'''
import vpapi
import json
import slugify

parties = {
    "kscm": {
        "name": "Komunistická strana Čech a Moravy",
        "color": "#ff0000",
        "position": -90,
        "groups": ["Poslanecký klub Komunistické strany Čech a Moravy"],
        "abbreviation": "KSČM"
    },
    "cssd": {
        "name": "Česká strana sociálně demokratická",
        "color": "#ff8000",
        "position": -50,
        "groups": ["Poslanecký klub České strany sociálně demokratické"],
        "abbreviation": "ČSSD"
    },
    "ods": {
        "name": "Občanská demokratická strana",
        "color": "#0000ff",
        "position": 80,
        "groups": ["Poslanecký klub Občanské demokratické strany"],
        "abbreviation": "ODS"
    },
    "vv": {
        "name": "Věci veřejné",
        "color": "#0088ff",
        "position": 20,
        "groups": ["Poslanecký klub Věci veřejné"],
        "abbreviation": "VV"
    },
    "top-09": {
        "name": "TOP 09",
        "color": "#660066",
        "position": 60,
        "groups": ["Poslanecký klub TOP 09 a Starostové"],
        "abbreviation": "TOP 09"
    },
    "nezarazeni": {
        "name": "Nezařazení",
        "color": "#777",
        "position": 0,
        "groups": ["Nezařazení"],
        "abbreviation": "Nezařazení"
    },
    "us": {
        "name": "Unie svobody",
        "color": "#00563f",
        "position": 60,
        "groups": ["Poslanecký klub Unie svobody","Poslanecký klub Unie svobody-Demokratické unie"],
        "abbreviation": "US"
    },
    "kdu-csl": {
        "name": "Křesťanská a demokratické unie - Československá strana lidová",
        "color": "#ffd700",
        "position": 20,
        "groups": ["Poslanecký klub Křesťanské a demokratické unie - Československé strany lidové","Poslanecký klub Křesťanské a demokratické unie-Československé strany lidové", "Poslanecký klub Křesťanské a demokratické unie - Československá strany lidové"],
        "abbreviation": "KDU-ČSL"
    },
    "cmus": {
        "name": "Českomoravská unie středu",
        "color": "#00ffff",
        "position": -25,
        "groups": ["Poslanecký klub Českomoravské unie středu"],
        "abbreviation": "ČMUS"
    },
    "hsdms": {
        "name": "Hnutí za samosprávnou demokracii Moravy a Slezska (Českomoravská strana středu)",
        "color": "#e1ad21",
        "position": -10,
        "groups": ["Poslanecký klub Českomoravské strany středu","Poslanecký klub Hnutí za samosprávnou demokracii Moravy a Slezska","Poslanecký klub Hnutí za samosprávnou demokracii - strany Moravy a Slezska"],
        "abbreviation": "HSDMS"
    },
    "lb": {
        "name": "Levý blok",
        "color": "#bf0202",
        "position": -80,
        "groups": ["Poslanecký klub Levého bloku"],
        "abbreviation": "LB"
    },
    "ano": {
        "name": "ANO 2011",
        "color": "#5f91b3",
        "position": 30,
        "groups": ["Poslanecký klub ANO 2011"],
        "abbreviation": "ANO"
    },
    "kds": {
        "name": "Křesťanskodemokratická strana",
        "color": "#002fa7",
        "position": 85,
        "groups": ["Poslanecký klub Křesťansko demokratické strany I.","Poslanecký klub Křesťansko demokratické strany"],
        "abbreviation": "KDS"
    },
    "spr-rsc": {
        "name": "Sdružení pro republiku - Republikánská strana Československa",
        "color": "#003153",
        "position": 95,
        "groups": ["Sdružení pro republiku - Republikánská strana Československa"],
        "abbreviation": "SPR-RSČ"
    },
    "oda": {
        "name": "Občanská demokratická aliance",
        "color": "#007ba7",
        "position": 90,
        "groups": ["Poslanecký klub Občanské demokratické aliance"],
        "abbreviation": "ODA"
    },
    "sz": {
        "name": "Strana zelených",
        "color": "#009900",
        "position": 40,
        "groups": ["Poslanecký klub Strany zelených","Nezařazení - Strana zelených"],
        "abbreviation": "SZ"
    },
    'usvit': {
        "name": "Úsvit přímé demokracie",
        "color": "#91b82e",
        "position": 25,
        "groups": ["Poslanecký klub Úsvitu přímé demokracie"],
        "abbreviation": "Úsvit"
    },
    'lsu': {
        "name": "Liberálně sociální unie",
        "color": "#50c878",
        "position": -5,
        "groups": ["Poslanecký klub Liberálně sociální unie"],
        "abbreviation": "LSU"
    },
    "csns": {
        "name": "Česká strana národně sociální",
        "color": "#bf0202",
        'position': 23,
        'groups': ["Poslanecký klub Liberální strany národně sociální"],
        "abbreviation": "ČSNS"
    },
    "onah": {
        "name": "Občanské národní hnutí",
        "color": "#000",
        "position": 30,
        "groups": ["Poslanecký klub Občanského národního hnutí"],
        "abbreviation": "ONAH"
    }

}

# organizations
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

i = 0
for key in parties:
    party = parties[key]
    party['children'] = []
    party['image'] = key + '.png'
    for keyo in organizations:
        if organizations[keyo]['name'] in party['groups']:
            party['children'].append(keyo)
            i = i + 1
            organizations[keyo]['done'] = True

for keyo in organizations:
    try:
        organizations[keyo]['done']
    except:
        print("Not found party for:")
        print(organizations[keyo])

with open("../www/json/parties.json", "w") as outfile:
    json.dump(parties,outfile)
