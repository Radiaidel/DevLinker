function toggleSection(section) {
    if (section === 'received') {
      document.getElementById('receivedBtn').classList.add('bg-sky-800', 'text-white', 'py-5');
      document.getElementById('receivedBtn').classList.remove('bg-white', 'text-neutral-900');
      document.getElementById('sentBtn').classList.remove('bg-sky-800', 'text-white', 'py-5');
      document.getElementById('sentBtn').classList.add('bg-white', 'text-neutral-900');
      document.getElementById('receivedContent').classList.remove('hidden');
      document.getElementById('recent_connections').classList.remove('hidden');

      document.getElementById('sentContent').classList.add('hidden');
      document.getElementById('suggested_users').classList.add('hidden');

    } else if (section === 'sent') {
      document.getElementById('receivedBtn').classList.remove('bg-sky-800', 'text-white', 'py-5');
      document.getElementById('receivedBtn').classList.add('bg-white', 'text-neutral-900');
      document.getElementById('sentBtn').classList.add('bg-sky-800', 'text-white', 'py-5'); 
      document.getElementById('sentBtn').classList.remove('bg-white', 'text-neutral-900');
      document.getElementById('receivedContent').classList.add('hidden');
      document.getElementById('recent_connections').classList.add('hidden');

      document.getElementById('sentContent').classList.remove('hidden');
      document.getElementById('suggested_users').classList.remove('hidden');

    }
  }


  document.getElementById('receivedBtn').addEventListener('click', function() {
    toggleSection('received');
  });

  document.getElementById('sentBtn').addEventListener('click', function() {
    toggleSection('sent');
  });

  toggleSection('received');