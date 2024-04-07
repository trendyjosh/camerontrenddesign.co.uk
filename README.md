# Cameron Trend Garden Design

A personal portfolio website and basic CMS for a Garden Designer in Kent to showcase completed projects and client feedback.

### Admin CMS

The admin panel allows editing of hero images on the main site pages (about, services, contact) and management of portfolio projects.

An admin can create and modify projects; adding image and text content, adjusting the order they appear under the portfolio section and setting the status as live or archived so they can be previewed before going live.

## Development

The portfolio website is developed using Laravel with Blade templates and custom CSS. The choice to use Blade (instead of Vue to match the admin panel) for the front-end is because the small scale of the website and minimal requirements for components.

The admin panel is scaffolded with Laravel Jetstream using Inertia, Vue and Tailwind.

## Hosting

Deployment is handled by Laravel forge on a Vultr hosted server.

Image optimisation is handled by [spatie/image-optimizer](https://github.com/spatie/image-optimizer) which requires that the image optimiser packages outlined in the [documentation](https://github.com/spatie/image-optimizer?tab=readme-ov-file#installation) are installed on the server for it to work.

## Future Enhancements

-   Re-enable instagram feed page
-   Rewrite the website CSS or replace with Tailwind
-   Replace default Jetstream dashboard with website analytics from Cloudflare
-   Add DaisyUI to admin CMS to improve many visual elements
