module.exports = {
    preset: 'ts-jest', // Usa ts-jest para transformar TypeScript correctamente
    testEnvironment: 'jsdom', // Simula el entorno del navegador
    setupFilesAfterEnv: ['<rootDir>/setupTests.js'], // Ejecuta configuración después de que el entorno esté listo
    transform: {
      '^.+\\.(ts|tsx|js|jsx)$': 'babel-jest', // Transforma archivos JS/TS con Babel
    },
    moduleFileExtensions: ['ts', 'tsx', 'js', 'jsx', 'json'], // Extensiones a resolver
    moduleNameMapper: {
      // Soporte para imports de módulos CSS, imágenes, etc., si usas Webpack o Vite
      '\\.(css|less|scss|sass)$': 'identity-obj-proxy',
      '\\.(jpg|jpeg|png|gif|webp|svg)$': '<rootDir>/__mocks__/fileMock.js',
    },
    testPathIgnorePatterns: ['/node_modules/', '/dist/'], // Ignora estas carpetas en pruebas
    collectCoverageFrom: ['src/**/*.{ts,tsx}', '!src/**/*.d.ts'], // Cobertura solo para archivos relevantes
  };
  