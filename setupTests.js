const { TextEncoder, TextDecoder } = require('text-encoding');


// Polyfill global para TextEncoder y TextDecoder
global.TextEncoder = TextEncoder;
global.TextDecoder = TextDecoder;