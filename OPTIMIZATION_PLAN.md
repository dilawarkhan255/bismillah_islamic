# BISMILLAH ACADEMY - OPTIMIZATION IMPLEMENTATION PLAN

## 1. DATABASE OPTIMIZATION
- [ ] Create HomeController with eager loading for home page
- [ ] Add database indexes on frequently queried columns
- [ ] Implement query caching for home page
- [ ] Move Section queries from Blade to Controller
- [ ] Add composite indexes for common query patterns

## 2. FRONTEND OPTIMIZATION
- [ ] Extract inline CSS from home.blade.php to CSS files
- [ ] Extract inline JS from home.blade.php to JS files
- [ ] Optimize Vite config for production (minification, code splitting)
- [ ] Enable gzip/brotli compression
- [ ] Implement lazy loading for images
- [ ] Remove unused CSS/JS

## 3. SCHEDULED TASKS
- [ ] Register commands in Kernel.php
- [ ] Add image optimization schedule (daily)
- [ ] Add database cleanup schedule (weekly)
- [ ] Add backup schedule (daily)
- [ ] Add log cleanup schedule (weekly)

## 4. PERMISSIONS ENHANCEMENT
- [ ] Create Policies for all models
- [ ] Define granular permissions
- [ ] Register policies in AuthServiceProvider
- [ ] Update controllers to use policies

## 5. VALIDATION IMPROVEMENTS
- [ ] Create FormRequest classes for all forms
- [ ] Move inline validation to FormRequests
- [ ] Add custom validation rules

## 6. CACHING STRATEGY
- [ ] Cache home page data (5 min)
- [ ] Cache site settings (1 hour)
- [ ] Cache sections per page (10 min)
- [ ] Use Redis if available, otherwise file cache