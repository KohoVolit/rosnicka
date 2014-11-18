'''creates file for filtering
using people.json and party.json
'''

import json

data = []
with open("../www/json/parties.json") as infile:
    parties = json.load(infile)

with open("../www/json/people.json") as infile:
    people = json.load(infile)
    
for k in parties:
    party = parties[k]
    data.append({'name': party['abbreviation'] + ' - ' + party['name'], 'link': 'party.php?party=' + k})

for k in people:
    person = people[k]
    for identifier in person['identifiers']:
        if identifier['scheme'] == 'psp.cz/osoby':
            idd = identifier['identifier']
    data.append({'name': person['name'], 'link': 'person.php?identifier=' + idd})

with open("../www/json/filter.json", "w") as outfile:
    json.dump(data,outfile)
    
