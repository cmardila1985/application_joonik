import React from 'react'; // <-- esta línea es necesaria
import { render } from '@testing-library/react';
import '@testing-library/jest-dom';
import Locations from '../pages/Locations';


// Datos mockeados de la API
const mockLocations = [
  {
    code: 1,
    name: 'Sede A',
    image: 'https://via.placeholder.com/150',
    creationDate: '2024-01-01T00:00:00Z',
  },
  {
    code: 2,
    name: 'Sede B',
    image: 'https://via.placeholder.com/150',
    creationDate: '2024-02-01T00:00:00Z',
  },
];

// Simular fetch global antes de todas las pruebas
beforeAll(() => {
  global.fetch = jest.fn(() =>
    Promise.resolve({
      ok: true,
      json: () => Promise.resolve(mockLocations),
    })
  ) as jest.Mock;
});

// Limpiar mock después de cada prueba
afterEach(() => {
  jest.clearAllMocks();
});

describe('Locations component', () => {
  test('muestra el loading y luego renderiza la lista de sedes', async () => {
    render(<Locations />);

  })

})