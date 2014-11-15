'''creates vote-events from API and updates issue.json
see vote-events-example.json
'''

import vpapi
import json

vpapi.parliament("cz/psp")

vote_events = {}
next = True
page = 1

with open('../www/json/issue.json') as data_file:
    issue = json.load(data_file)

for key in issue["vote_events"]:
    rve = vpapi.get("vote-events",where={"identifier":key},embed=["motion"])
    try:
        ve = rve["_items"][0]
        issue["vote_events"][key]['available_vote_event'] = True
        vote_event = {
            "id": ve["id"],
            "motion": {
                "text": ve["motion"]["text"],
                "requirement": ve["motion"]["requirement"],
                "id": ve["motion"]["id"]
            },
            "start_date": ve["start_date"],
            "identifier": ve["identifier"],
            "result": ve["result"],
        }
        next = True
        page = 1
        votes = []
        while next:
            rv = vpapi.get("votes",page=page,where={"vote_event_id":ve["id"]})
            for v in rv["_items"]:
                votes.append({
                    "voter_id": v["voter_id"],
                    "group_id": v["group_id"],
                    "option": v["option"]
                })
            page = page + 1
            try:
                rv["_links"]["next"]
            except:
                next = False
        vote_event["votes"] = votes
        if len(votes) == 0:
            issue["vote_events"][key]['available_vote_event'] = False
        
        vote_events[ve["identifier"]] = vote_event
        
    except:
        issue["vote_events"][key]['available_vote_event'] = False

with open("../www/json/vote-events.json", "w") as outfile:
    json.dump(vote_events,outfile)

with open("../www/json/issue.json", "w") as outfile:
    json.dump(issue,outfile) 
