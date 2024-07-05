function updateDateTime() {
  const now = new Date();
  
  // Update time (without seconds)
  const time = now.toLocaleTimeString('fr-FR', { 
    hour: '2-digit', 
    minute: '2-digit'
  });
  document.getElementById('time').textContent = time;
  
  // Update date with short day name
  const date = now.toLocaleDateString('fr-FR', { 
    weekday: 'short',
    year: 'numeric', 
    month: 'long', 
    day: 'numeric' 
  });
  document.getElementById('date').textContent = date;
}

// Update immediately
updateDateTime();

// Then update every minute
setInterval(updateDateTime, 60000);
