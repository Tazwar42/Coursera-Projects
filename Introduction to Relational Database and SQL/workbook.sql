USE mydb;

/* ============================================================================ */
/* SECTION 1: SELECT statements                                                 */
/* ============================================================================ */


-- select * from us_state;
-- select * from us_state where name="California";
-- select name, capital from us_state where name="California"
-- select name, capital from us_state where area_size<=10000




/* ---- TASK 1 ---------------------------------------------------------------- */
/* Write an SQL statement to find out what is the state capital of Oregon       */
/* hint: the names of the columns you need are: name and capital                */
/* ---------------------------------------------------------------------------- */
-- select name, capital from us_state where name="Oregon"






/* ============================================================================ */
/* SECTION 2: SELECT statements with pattern matching and sorting               */
/* ============================================================================ */

-- select * from us_state order by area_size DESC
-- select * from us_state where name LIKE "M%" order by name




/* ---- TASK 2 ---------------------------------------------------------------- */
/* Write an SQL statement to display all the states with abbreviations that     */
/* start with the letter "N", sort your results by state capital                */
/* ---------------------------------------------------------------------------- */

-- select * from us_state where abbreviation LIKE "N%" order by capital





/* ============================================================================ */
/* SECTION 3: INSERT statements                                                 */
/* ============================================================================ */

-- insert into club_member 
-- set first_name ="Harrison",
-- last_name = "king",
-- phone_number = "24333"






/* ---- TASK 3 ---------------------------------------------------------------- */
/* Using the above example as a guide,                                          */
/* write an SQL statement to insert a new member into the table club_member     */
/* set first_name to "John", last_name to "Doe"                                 */
/* and phone_number to "9998887777"                                             */
/* ---------------------------------------------------------------------------- */

-- insert into club_member 
-- set first_name ="John",
-- last_name = "Doe",
-- phone_number = "9998887777"






/* ============================================================================ */
/* SECTION 4: DELETE statements                                                 */
/* ============================================================================ */






/* ---- TASK 4 ---------------------------------------------------------------- */
/* Using the above example as a guide,                                          */
/* write an SQL statement to delete the row in the table club_member            */
/* if the phone_number is "9998887777"                                          */  
/* ---------------------------------------------------------------------------- */

-- Delete from club_member where phone_number = "9998887777"








/* ============================================================================ */
/* SECTION 5: Joining tables                                                    */
/* ============================================================================ */








/* ---- TASK 5 ---------------------------------------------------------------- */
/* Using the above example as a guide,                                          */
/* write an SQL statement to:                                                   */
/*                                                                              */
/* 1. include these columns in your results:                                    */
/*    first_name, middle_name, last_name, professional_title, tier.description  */
/*                                                                              */
/* 2. your columns will come from the tables club_member and tier               */
/*                                                                              */
/* 3. linking the tier_code column of the table club_member                     */
/*    to the code column of the table tier                                      */                        
/*                                                                              */
/* 4. sort the results by last_name                                             */
/*                                                                              */
/* ---------------------------------------------------------------------------- */



-- select club_member.member_id, first_name, last_name, description, amount, due_date 
-- from club_member, invoice 
-- where club_member.member_id=invoice.member_id


select first_name, middle_name, last_name, professional_title, tier.description
from club_member,tier
where club_member.tier_code = tier.code order by last_name



/* ============================================================================ */
/*                                                                              */
/* Congratulations, you have reached the end of the course!!                    */
/*                                                                              */
/* ============================================================================ */

