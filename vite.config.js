import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // or @vitejs/plugin-react if you're using React
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
    vue(),
  ],
  build: {
    manifest: true,
  },
});
