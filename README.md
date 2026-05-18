# Loyalty Card Plugin for Pelican Panel

This plugin adds a loyalty card system to your Pelican Panel.

## Features
- **Loyalty Cards**: Users can claim a loyalty card.
- **Points**: Users can collect points (currently via a dashboard widget).
- **Admin Management**: Admins can manage loyalty cards and points through the Filament resource.

## Installation
1. Move this folder to the `plugins/` directory of your Pelican installation.
   ```bash
   mv pelican-loyalty-card /var/www/pelican/plugins/loyalty-card
   ```
2. Ensure the folder name matches the ID in `plugin.json` (`loyalty-card`).
3. Run the installation command:
   ```bash
   php artisan p:plugin:install
   ```
4. Select `Loyalty Card` from the list and follow the prompts.

## Development
- **Models**: `src/Models/LoyaltyCard.php`
- **Resources**: `src/Filament/Resources/LoyaltyCardResource.php`
- **Widgets**: `src/Filament/Widgets/LoyaltyCardWidget.php`
- **Migrations**: `database/migrations/`
