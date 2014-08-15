'''creates issue from google sheet
see issue-example.json
'''

import json
import requests

url = "https://spreadsheets.google.com/feeds/list/12Q6BTpzH6_2ppMzf7orLLkynmX5c5ecNosnqtlx6tXg/1/public/full?alt=json"
r = requests.get(url)
r.raise_for_status()

spreadsheet = json.loads(r.text)

def pro2position(pro):
    if pro == "pro":
        return 1
    if pro == "proti":
        return -1
    else:
        return 0
        

issue = {
    "id": "rosnicka",
    "title": "Rosnička",
    "phrase": "To se to zelená...",
    "vote_events": {}
}
i = 0   #last term only
for row in spreadsheet["feed"]["entry"]:
    item = {}
    item["identifier"] = row["gsx$číslohlasovánízpspnapř.54543"]["$t"].strip()
    item["name"] = row["gsx$jménohlasovánílidské"]["$t"].strip()
    item["description"] = row["gsx$popishlasovánílidský"]["$t"].strip()
    item["pro_issue"] = pro2position(row["gsx$prospěšněproproti"]["$t"].strip())
    item["weight"] = row["gsx$váhadefault1"]["$t"].strip()
    if item["weight"] == "":
        item["weight"] = "1"
    subcat = row["gsx$kategorieoddělenéčárkou"]["$t"].strip()
    item["subcategory"] = []
    if subcat != "":
        for sc in subcat.split(','):
            item["subcategory"].append(sc.strip())
    item["links"] = []
    if row["gsx$odkaznatisk"]["$t"].strip() != "":
        item["links"].append({"url": row["gsx$odkaznatisk"]["$t"].strip(), "note": "Tisk"})
    if item["pro_issue"] != 0 and item["identifier"] != "":
        issue["vote_events"][item["identifier"]] = item
    i = i + 1
    # last term only:
    if (i > 39):
        break

with open("../www/json/issue.json", "w") as outfile:
    json.dump(issue,outfile)
