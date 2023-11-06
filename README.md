# nota_test_php
- Please place your solutions in separated files:
  - task1.php - for Task 1
  - task2.php - for Task 2
  - task3.php - for Task 3
- Please comment the code in PHPDocumentor style.

# **Task 1**
Create  script that should find all files in the /datafiles folder with names consisting of numbers and letters of the Latin alphabet, having the .ixt extension/
Display the names of these files, ordered by name.
Using regular expressions would be an advantage
Please comment the code in PHPDocumentor style.

# **Task 2**
Create script for downloading the page https://www.wikipedia.org/, extract headings, abstracts, pictures, links from the page part with sections, save it in the wiki_sections table, which has the following structure:

id integer, auto-incremental
date_created in year-month-day format hours:minutes:seconds
title string no more than 230 characters
url string no more than 240 characters, unique
picture string no more than 240 characters, unique
abstract string no more than 256 characters, unique

![image](https://github.com/mskozhanova/nota_test_php/assets/17182091/e5fc6f7c-6c17-440b-90fc-19a23c46fd33)

Please comment the code in PHPDocumentor style.

# **Task 3**
Create PHP class  TableCreator.
Should be impossible to create a descendant from this class, the class should consist of 3 methods:

- create()
accessible only within the class, creates a table Test containing those fields:

id integer, auto-incremental
script_name string, 25 characters long
start_time datetime
end_time datetime
result one option from 'normal', 'illegal', 'failed', 'success'

- fill()
accessible only within the class, fills the table with random data (fill free to use any chat gpt)

- get()
accessible from outside the class
selects  data from the table Test according to the criterion: result among the values 'normal' and 'success'

The constructor executes the create and fill methods.
Please comment the code in PHPDocumentor style.
