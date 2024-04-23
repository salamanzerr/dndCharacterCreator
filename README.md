# dndCharacterCreator
Website to create and store Dungeons &amp; Dragons characters within a database. Can create a character manually or use the integrated API to generate a character.

## Pages include (names subject to change):
1. <strong>landing:</strong> landing page to get to others
2. <strong>characterDB:</strong> Page to look at, interact with database of character info
3. <strong>characterCreator:</strong> Page for manual character creation (charCreator.php)
4. <strong>generateCharacter.php:</strong> Page to submit prompt to DnD API to generate character automatically
5. <strong>generateImage.php:</strong> Page to generate an AI image of an existing character in the database
6. <strong>bugReport.php:</strong> Reporting a bug, simple PHP form

## New Stuff:
1. <strong>Files added: charDB.php, update.php, processUpdate.php</strong>
   - these three files allow the user to see all the characters in a table, edit those characters stats, and save those edited stats to the DB
2. <strong>Files updated: charCreator.php, form.php</strong>
   - added the skills to the form in charCreator.php, form.php can now insert the skills from the form into the DB

Other ideas:
- Image generation API
- Allow accounts to be made to save character info? Maybe using [Firebase](https://firebase.google.com)

Project created for CSC-3212: Web Technologies
