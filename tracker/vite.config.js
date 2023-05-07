import { defineConfig } from "vite";

export default defineConfig({
  build: {
    lib: {
      entry: "./main.js",
      name: "wAnalytics",
      fileName: "l",
    },
  },

  server: {
    port: 3001,
    open: false,
    host: "0.0.0.0",
  },
});