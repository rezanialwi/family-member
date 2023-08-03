### RKK Papperless Office 

## Configuration

    * cp .env.example .env
    * composer install
    * php artisan key:generate
    * php artisan migrate:fresh --seed
    * php artisan serve

## How to Use API 
    * GET /api/family-members - Get all family members
    * POST /api/family-members - Create a new family member
    * GET /api/family-members/{id} - Get a specific family member by ID
    * PUT /api/family-members/{id} - Update a specific family member by ID
    * DELETE /api/family-members/{id} - Delete a specific family member by ID


