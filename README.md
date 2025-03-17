# Subscription Platform

# Installation
1. Clone the repository
2. Run `composer install`

# Seed the database
1. Run `php artisan migrate:fresh --seed`

# Mailing
- Mailtrap.io is used to send emails. You can sign up for a free account at https://mailtrap.io/.
1. To send emails, you need to set up your mailtrap.io account and update the .env file with your mailtrap.io credentials.

# Background Tasks and Queues
- Run `php artisan queue:work` to start the queue worker in development.
- Run `php artisan schedule:work` to start the scheduler in development.
- Without these commands, emails will not be sent.
