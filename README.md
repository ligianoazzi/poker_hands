# Poker hands

The file hands.txt, contains 1000 random hands dealt to two players.
Each line of the file contains ten cards (space separated). the
first five are Player 1's cards and the last five are Player 2's cards. You can
assume that all hands are valid, each player's hand is in no specific order and
in each hand there is a clear winner.

Build a PHP MVC solution that has the following Functionality:

1. Upload the file
2. Parse file into a DB
3. have a way to show how many hands player 1 wins
4. Authentication

Please upload the completed solution with a README.md of how to get everything
up and running to github.

# Running the project

1. Clone repository
2. Go to project directory:
   1. Rename `.env.example` to `.env` or copy in main directory
   2. Open `.env` file:
      1. Set `DB_DATABASE` - database name on your local machine
      2. Set `DB_USERNAME` and `DB_PASSWORD` - database credentials on your local machine
   3. Run command `composer install`
   4. Run command `php artisan migrate --seed` to migrate tables and create test data for Users
      1. Test Users have a random email address
      2. Default password for test Users is `secret`

3. Create storage link (we have the images of the cards)
   1. Run command `php artisan storage:link`

4. Run server using command `php artisan serve`. Project will be available on `http://127.0.0.1:8000`

# Endpoints

| Method | URI                                       | Description                                               |
| ------ | ----------------------------------------- | --------------------------------------------------------- |
| GET    | `/`                                       | Show main page                                            |
| GET    | `/login`                                  | Show login page                                           |
| POST   | `/login`                                  | Login User using credentials                              |
| POST   | `/logout`                                 | Logout User                                               |
| GET    | `/register`                               | Show register page                                        |
| POST   | `/register`                               | Register new User                                         |
| GET    | `/games/{game}`                           | Show game details                                         |
| DELETE | `/games/{game}`                           | Delete existing game                                      |
| POST   | `/users/{user}/files`                     | Upload file with game details                             |

# Running the tests

1. Run command `php artisan dusk`

# General explanations

1. I am using Laravel Dusk for the tests, the file is tests\Browser\PokerHandsTest.php
2. The rank logical is in app\Traits\name-of-rank
   2.1 I used traits because in my opiniao, in this case we needs only a code reuse,doesn't fit as a inheritance.

3. The screenshots: https://docs.google.com/document/d/1amc_38bDUTqDiUCIS_YPIumrGF9JjYp946rzRfRsmVw/edit?usp=sharing

