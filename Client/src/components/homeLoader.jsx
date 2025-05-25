export async function homeLoader() {
  const res = await fetch("https://server.rst-bd.com/api/clients");
  if (!res.ok) throw new Error(`Failed to fetch clients: ${res.statusText}`);
  const clients = await res.json();
  return { clients };
}
