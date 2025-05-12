import { useEffect, useState } from 'react';
import axios from 'axios';
import {
  Box,
  Card,
  CardContent,
  CardMedia,
  Typography,
  Container,
  CircularProgress
} from '@mui/material';

interface Location {
  code: number;
  name: string;
  image: string;
  creationDate: string;
}

const Locations = () => {
  const [locations, setLocations] = useState<Location[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios.get('/api/locations', {
      headers: {
        'X-API-KEY': 'supersecreta123',
      }
    })
    .then(response => {
      setLocations(response.data);
    })
    .catch(error => {
      console.error('Error fetching locations:', error);
    })
    .finally(() => {
      setLoading(false);
    });
  }, []);

  if (loading) {
    return (
      <Container sx={{ display: 'flex', justifyContent: 'center', marginTop: 4 }}>
        <CircularProgress />
      </Container>
    );
  }

  return (
    <Container sx={{ marginTop: 4 }}>
      <Typography variant="h4" component="h1" gutterBottom align="center">
        Lista de Sedes
      </Typography>
      <Box
        sx={{
          display: 'flex',
          overflowX: 'auto',
          gap: 2,
          paddingY: 2
        }}
      >
        {locations.map(location => (
          <Card
            key={location.code}
            sx={{
              minWidth: 300,
              flex: '0 0 auto'
            }}
          >
            <CardMedia
              component="img"
              height="180"
              image={location.image}
              alt={location.name}
            />
            <CardContent>
              <Typography variant="h6">{location.name}</Typography>
              <Typography variant="body2" color="text.secondary">
                Creado el: {new Date(location.creationDate).toLocaleDateString()}
              </Typography>
            </CardContent>
          </Card>
        ))}
      </Box>
    </Container>
  );
};

export default Locations;
