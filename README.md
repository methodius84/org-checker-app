## About Project

This is Organization Checker, used to validate organization address through opened resources.

## How to run

### Launch the server
```bash
npm run build
php artisan serve
```
### Launch worker
```bash
php artisan queue:work
```

### Set up env variables for Checko Service and SMTP
```dotenv
# mail config
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=""
MAIL_FROM_NAME="${APP_NAME}"

CHECKO_API_KEY=""
CHECKO_BASE_URI="https://api.checko.ru/v2/"
# Where to send reports
REPORT_MAIL=""
```

## Available commands:

```bash
  # Check all organizations for unreliability
    php artisan app:check-organizations
  # Check single organization
  # @param {organization} = uuid
    php artisan app:check-org {organization}
```
