-- Last modification date: 2017-10-29

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);

-- TABLES
-- Table: job_offer
CREATE TABLE job_offer (
    id int NOT NULL AUTO_INCREMENT,
    ref_test int NULL,
    position varchar(64) NOT NULL,
    description text NOT NULL,
    is_active tinyint(1) NOT NULL COMMENT '1 for active, 0 for inactive',
    CONSTRAINT job_offer_pk PRIMARY KEY (id)
);

-- Table: permissions
CREATE TABLE permissions (
    id int NOT NULL AUTO_INCREMENT,
    ref_test int NOT NULL,
    ref_user int NOT NULL,
    permission varchar(4) NOT NULL COMMENT '[creator, edit, view]',
    CONSTRAINT permissions_pk PRIMARY KEY (id)
);

-- Table: question
CREATE TABLE question (
    id int NOT NULL AUTO_INCREMENT,
    ref_test int NOT NULL,
    type varchar(32) NOT NULL COMMENT '[open, choice, scale]',
    title varchar(512) NOT NULL,
    content text NOT NULL,
    CONSTRAINT question_pk PRIMARY KEY (id)
);

-- Table: submission
CREATE TABLE submission (
    id int NOT NULL AUTO_INCREMENT,
    ref_job_offer int NOT NULL,
    ref_test int NOT NULL,
    ref_user int NOT NULL,
    grade int(3) NOT NULL,
    CONSTRAINT submission_pk PRIMARY KEY (id)
);

-- Table: submission_answer
CREATE TABLE submission_answer (
    id int NOT NULL AUTO_INCREMENT,
    ref_submission int NOT NULL,
    ref_question int NOT NULL,
    answer text NOT NULL,
    CONSTRAINT submission_answer_pk PRIMARY KEY (id)
);

-- Table: test
CREATE TABLE test (
    id int NOT NULL AUTO_INCREMENT,
    title int NOT NULL,
    locale varchar(2) NOT NULL COMMENT 'ISO 3166-1-alpha-2 code',
    is_active tinyint(1) NOT NULL COMMENT '1 for active, 0 for inactive',
    CONSTRAINT test_pk PRIMARY KEY (id)
);

-- Table: user
CREATE TABLE user (
    id int NOT NULL AUTO_INCREMENT,
    role varchar(64) NOT NULL DEFAULT 'candidate' COMMENT '[moderator, test_editor, candidate]',
    email varchar(128) NOT NULL,
    password varchar(128) NOT NULL,
    firstname varchar(64) NOT NULL,
    lastname varchar(64) NOT NULL,
    CONSTRAINT user_pk PRIMARY KEY (id)
);

-- FOREIGN KEYS
-- Reference: job_offer_test (table: job_offer)
ALTER TABLE job_offer ADD CONSTRAINT job_offer_test FOREIGN KEY job_offer_test (ref_test)
    REFERENCES test (id);

-- Reference: permissions_test (table: permissions)
ALTER TABLE permissions ADD CONSTRAINT permissions_test FOREIGN KEY permissions_test (ref_test)
    REFERENCES test (id);

-- Reference: permissions_user (table: permissions)
ALTER TABLE permissions ADD CONSTRAINT permissions_user FOREIGN KEY permissions_user (ref_user)
    REFERENCES user (id);

-- Reference: question_test (table: question)
ALTER TABLE question ADD CONSTRAINT question_test FOREIGN KEY question_test (ref_test)
    REFERENCES test (id);

-- Reference: submission_answer_question (table: submission_answer)
ALTER TABLE submission_answer ADD CONSTRAINT submission_answer_question FOREIGN KEY submission_answer_question (ref_question)
    REFERENCES question (id);

-- Reference: submission_answer_submission (table: submission_answer)
ALTER TABLE submission_answer ADD CONSTRAINT submission_answer_submission FOREIGN KEY submission_answer_submission (ref_submission)
    REFERENCES submission (id);

-- Reference: submission_job_offer (table: submission)
ALTER TABLE submission ADD CONSTRAINT submission_job_offer FOREIGN KEY submission_job_offer (ref_job_offer)
    REFERENCES job_offer (id);

-- Reference: submission_test (table: submission)
ALTER TABLE submission ADD CONSTRAINT submission_test FOREIGN KEY submission_test (ref_test)
    REFERENCES test (id);

-- Reference: submission_user (table: submission)
ALTER TABLE submission ADD CONSTRAINT submission_user FOREIGN KEY submission_user (ref_user)
    REFERENCES user (id);

-- End of file.
