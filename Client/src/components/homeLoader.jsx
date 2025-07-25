export async function homeLoader() {
  const clientsRes = await fetch("https://server.rst-bd.com/api/clients");
  const clientsPhotoRes = await fetch("https://server.rst-bd.com/api/clientsphoto");

  if (!clientsRes.ok) {
    throw new Error(`Failed to fetch clients: ${clientsRes.statusText}`);
  }

  if (!clientsPhotoRes.ok) {
    throw new Error(`Failed to fetch clients photo: ${clientsPhotoRes.statusText}`);
  }

  const clients = await clientsRes.json();
  const clientsphoto = await clientsPhotoRes.json();

  return { clients, clientsphoto };
}
