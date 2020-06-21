# spooky-treatment-diary
Spooky2 Treatment Diary allowing the ability to show what treatments have been done on patients/recipients.

**Installation**

*What's required?*
* a website to host these files on (Will work on Apache/Nginx webservers)
* you must have mysql/mariadb databse setup 
* import **schema.sql** into the newly freshly setup db **user/pass required to be setup in dbconn.inc.php**
* extract html files & import sql schema file to create required tables for spooky on mysql db.
* visit your url where files are installed, example: https://www.mywebsite.com/spooky2/diary

**Todo**
- [x] create this todo list
- [ ] colour highlighting of continuous running programs/presets.
- [ ] implement bfb csv import & file attach function
- [ ] sum totals
- [ ] search functionality including notes
- [ ] database schema and data structure upgrade on version upgrades
- [ ] fix hyphenated text php/mysql error in Notes and other select inputs been outputed
- [ ] ported as an app
- [ ] fixing code every-where :)
- [ ] fix awful design style some day too
- [ ] ability to select more than one program or preset at one time
- [ ] future dev of replacing preset/program drop downs with a autofill box that allows multiple entries
- [ ] Preset chain creator/selector, to group together programs into one.
- [ ] Add column filter, filter by name for example.
