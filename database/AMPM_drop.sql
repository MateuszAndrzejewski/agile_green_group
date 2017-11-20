-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2017-10-29 14:13:19.614

-- foreign keys
ALTER TABLE job_offer
    DROP FOREIGN KEY job_offer_test;

ALTER TABLE permissions
    DROP FOREIGN KEY permissions_test;

ALTER TABLE permissions
    DROP FOREIGN KEY permissions_user;

ALTER TABLE question
    DROP FOREIGN KEY question_test;

ALTER TABLE submission_answer
    DROP FOREIGN KEY submission_answer_question;

ALTER TABLE submission_answer
    DROP FOREIGN KEY submission_answer_submission;

ALTER TABLE submission
    DROP FOREIGN KEY submission_job_offer;

ALTER TABLE submission
    DROP FOREIGN KEY submission_test;

ALTER TABLE submission
    DROP FOREIGN KEY submission_user;

-- tables
DROP TABLE job_offer;

DROP TABLE permissions;

DROP TABLE question;

DROP TABLE submission;

DROP TABLE submission_answer;

DROP TABLE test;

DROP TABLE user;

-- End of file.

