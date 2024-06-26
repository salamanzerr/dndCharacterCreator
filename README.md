# dndCharacterCreator
Website to create and store Dungeons &amp; Dragons 5e characters within a database. Can create a character manually, update existing characters, and report any bugs or changes on the site.

## Pages include:
1. <strong>landing:</strong> landing page to get to others
2. <strong>characterDB:</strong> Page to look at, interact with database of character info
3. <strong>updateCharacter:</strong> Page to update an existing character in the database
4. <strong>characterCreator:</strong> Page for manual character creation
5. <strong>bugReport:</strong> Reporting a bug, simple PHP form

possibly:
1. <strong>generateImage.php:</strong> Page to generate an AI image of an existing character in the database
2. <strong>generateCharacter.php:</strong> Page to submit prompt to DnD API to generate character automatically

## New Stuff:
1. <strong>Files added: charDB.php, update.php, processUpdate.php</strong>
   - these three files allow the user to see all the characters in a table, edit those characters stats, and save those edited stats to the DB
2. <strong>Files updated: charCreator.php, form.php</strong>
   - added the skills to the form in charCreator.php, form.php can now insert the skills from the form into the DB

Other ideas:
- Generating a character using the DnD API
- Image generation API
- Allow accounts to be made to save character info? Maybe using [Firebase](https://firebase.google.com)

Project created for CSC-3212: Web Technologies
