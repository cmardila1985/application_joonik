// resources/js/Pages/Users/Index.jsx

import React from 'react';
import { usePage } from '@inertiajs/react';

export default function Index() {
  const { users } = usePage().props;

  return (
    <div className="p-6">
      <h1 className="text-2xl font-bold mb-4">Usuarios</h1>
      <table className="min-w-full bg-white border">
        <thead>
          <tr className="bg-gray-100 text-left">
            <th className="py-2 px-4 border">ID</th>
            <th className="py-2 px-4 border">Nombre</th>
            <th className="py-2 px-4 border">Correo</th>
            <th className="py-2 px-4 border">Creado</th>
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <tr key={user.id} className="hover:bg-gray-50">
              <td className="py-2 px-4 border">{user.id}</td>
              <td className="py-2 px-4 border">{user.name}</td>
              <td className="py-2 px-4 border">{user.email}</td>
              <td className="py-2 px-4 border">{user.created_at}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}
