<p align="center">
  <img src="public/img/logo.png" width="160" alt="Bismillah Islamic Academy Logo">
</p>

<h1 align="center">Bismillah Islamic Academy</h1>

<p align="center">
  <em>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</em><br>
  In the Name of Allah, the Most Gracious, the Most Merciful
</p>

<p align="center">
  <strong>Laravel 12</strong> &middot;
  <strong>PHP 8.2</strong> &middot;
  <strong>MySQL</strong> &middot;
  <strong>Bootstrap 5</strong> &middot;
  <strong>Vite</strong>
</p>

---

## About

**Bismillah Islamic Academy** is a complete CMS for Islamic educational institutions. Built with Laravel 12, it features a dynamic public website and a professional admin panel (adminHMD theme) with role-based access control.

> *"Read in the name of your Lord who created"* — Surah Al-Alaq (96:1)

---

## Features

### Public Website
- Homepage with hero slideshow, courses, teachers, testimonials
- Courses listing page
- Gallery page
- Blog with categories
- Teachers page & Our Team page (separate systems)
- Team member profile pages (`/team-member/{slug}`)
- Individual teacher profiles (`/team/{teacher}`)
- Contact form & Free Trial enrollment
- Pricing plans
- Privacy policy page
- WhatsApp integration (Pakistan & UK numbers)

### Admin Panel (`/admin/login`)
- Professional adminHMD theme (Navy `#0D1B2A` + Gold `#AE8225`)
- Dark/Light mode with localStorage persistence
- Collapsible sidebar with icon-only mode
- Role-based access: **Admin** (full access), **Editor** (content only), **User** (default)
- Yajra DataTables with export (CSV, PDF, Print, ColVis)
- Modal-based add/edit forms
- SweetAlert2 confirmations
- Real-time notification badge (Pusher)

### Admin CRUD Modules
| Module | Editor | Admin |
|---|---|---|
| Teachers | ✓ | ✓ |
| Courses | ✓ | ✓ |
| Blog Posts | ✓ | ✓ |
| Blog Categories | ✓ | ✓ |
| Testimonials | ✓ | ✓ |
| Gallery | ✓ | ✓ |
| Team Members | ✓ | ✓ |
| Hero Slides | — | ✓ |
| Pricing Plans | — | ✓ |
| Enrollments | — | ✓ |
| Messages | — | ✓ |
| Free Trials | — | ✓ |
| Users & Roles | — | ✓ |
| Settings | — | ✓ |

### Auth & Security
- Laravel Breeze authentication
- All auth pages under `/admin/` prefix (login, register, forgot/reset password)
- Spatie Laravel Permission (`admin`, `editor`, `user` roles)
- Separate admin login page at `/admin/login`
- Frontend has no login button (admin-only access via URL)

---

## Requirements

- PHP **^8.2**
- Composer **2.x**
- MySQL **8.0+** / MariaDB **10.6+**
- Node.js **20+** & NPM **10+**
- PHP Extensions: `BCMath`, `Ctype`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PDO`, `Tokenizer`, `XML`, `GD` (for image processing)

---

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/dilawarkhan255/bismillah_islamic.git
cd bismillah_islamic

# 2. Install PHP dependencies
composer install

# 3. Copy environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Configure .env — set database & mail credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bismillah_islamic
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your-email@gmail.com"
MAIL_FROM_NAME="Bismillah Islamic Academy"

BROADCAST_CONNECTION=pusher
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

# 6. Install Node dependencies
npm install && npm run build

# 7. Create MySQL database named `bismillah_islamic`

# 8. Run migrations and seeders
php artisan migrate --seed

# 9. Create storage symlink
php artisan storage:link

# 10. Start the development server
php artisan serve
```

---

## Default Accounts

| Role | Email | Password |
|---|---|---|
| **Admin** | `admin@bismillahacademy.com` | `password` |
| **Editor** | `editor@bismillahacademy.com` | `password` |
| **User** | `user1@gmail.com` | `password` |
| **User** | `user2@gmail.com` | `password` |
| **User** | `user3@gmail.com` | `password` |

---

## Routes

### Frontend Pages
| Route | Page |
|---|---|
| `/` | Home |
| `/about` | About Us |
| `/courses` | Courses |
| `/gallery` | Gallery |
| `/blog` | Blog |
| `/team` | Our Teachers |
| `/team/{teacher}` | Teacher Profile |
| `/our-team` | Our Team |
| `/team-member/{slug}` | Team Member Profile |
| `/contact` | Contact Us |
| `/free_trial` | Free Trial |
| `/pricing` | Pricing Plans |
| `/privacy_policy` | Privacy Policy |
| `/dashboard` | User Dashboard (redirects admin/editor to `/admin`) |

### Admin Routes (prefix `admin/login` for login)
| Route | Module |
|---|---|
| `/admin` | Dashboard |
| `/admin/teachers` | Teacher CRUD |
| `/admin/team-members` | Team Member CRUD |
| `/admin/courses` | Course CRUD |
| `/admin/blog` | Blog CRUD |
| `/admin/blog-categories` | Blog Category CRUD |
| `/admin/testimonials` | Testimonial CRUD |
| `/admin/gallery` | Gallery CRUD |
| `/admin/hero-slides` | Hero Slides CRUD |
| `/admin/pricing` | Pricing CRUD |
| `/admin/enrollments` | Enrollment Management |
| `/admin/messages` | Messages |
| `/admin/free-trials` | Free Trial Submissions |
| `/admin/users` | User & Role Management |
| `/admin/settings` | Site Settings |
| `/admin/login` | Admin Login |
| `/admin/register` | Admin Registration |
| `/admin/forgot-password` | Password Reset |
| `/admin/logout` | Logout |

---

## Project Structure

```
bismillah-academy/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # 16 admin controllers
│   │   └── Auth/               # Breeze auth controllers
│   ├── Models/                 # Eloquent models
│   └── Helpers/
│       └── helpers.php         # Global `setting()` helper
├── bootstrap/
│   └── app.php                 # Spatie middleware aliases
├── config/
│   ├── permission.php          # Spatie permission config
│   └── broadcasting.php        # Pusher config
├── database/
│   ├── migrations/             # All table migrations
│   └── seeders/                # Seeders with sample data
├── public/
│   ├── admin-assets/           # adminHMD template assets
│   ├── css/                    # Frontend CSS files
│   └── storage/                # Storage symlink → storage/app/public
├── resources/views/
│   ├── layouts/                # app.blade.php, guest.blade.php
│   ├── admin/
│   │   ├── layouts/app.blade.php   # Admin layout
│   │   ├── pages/                  # 15 admin CRUD views
│   │   └── auth/                   # Login, register, etc.
│   ├── pages/                      # 15 frontend pages
│   ├── partials/                   # Header, footer, enroll modal
│   └── components/admin/           # Modal, confirm-delete components
├── routes/
│   ├── web.php                     # Public routes
│   ├── admin.php                   # Admin CRUD routes
│   ├── auth.php                    # Auth routes (/admin prefix)
│   └── channels.php                # Pusher broadcast channels
└── storage/app/public/
    └── settings/                   # Uploaded images
```

---

## Theme

| Color | Hex | Usage |
|---|---|---|
| Navy | `#0D1B2A` | Backgrounds, sidebar |
| Dark Navy | `#060F18` | Dark mode sidebar |
| Gold | `#AE8225` | Accents, buttons, borders |
| Light Gold | `#D4A843` | Hover states |

**Fonts:** Cinzel (headings) &middot; Amiri (Arabic) &middot; Lato (body)

---

## Email Configuration

The app uses **Gmail SMTP** for contact form and enrollment notifications. To set up:

1. Enable 2-Factor Authentication on your Gmail account
2. Generate an **App Password** from Google Account → Security → App Passwords
3. Add to `.env`:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

Contact form submissions are sent to: `bismillahquranacademy2@gmail.com`

---

## Real-time Notifications (Pusher)

1. Create a free account at [pusher.com](https://pusher.com)
2. Create a new Channels app
3. Add credentials to `.env`:
```
BROADCAST_CONNECTION=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=mt1
```
4. Start queue worker: `php artisan queue:listen`

---

## Troubleshooting

### Admin routes not working (404)
The PHP built-in server may intercept `/admin/` directory. The solution uses `/admin-assets/` for static files.

### Storage images not showing
```bash
php artisan storage:link
```
If `public/storage` already exists as a directory, remove it first:
```bash
rm -rf public/storage
php artisan storage:link
```

### Permission denied
On Linux:
```bash
chmod -R 775 storage bootstrap/cache
```

---

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
  Made with ❤️ for the Muslim Ummah<br>
  <strong>Bismillah Islamic Academy</strong> — Nurturing the Next Generation of Muslims
</p>
