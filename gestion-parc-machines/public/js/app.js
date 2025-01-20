$(document).ready(function() {
    // Fonction commune de chargement des machines
    function loadMachines() {
        var formData = $('#filter-form').serialize();
        var tableContainer = $('#machines-table');

        $.ajax({
            url: $('#filter-form').attr('action'),
            data: formData,
            beforeSend: function() {
                tableContainer.addClass('opacity-50');
            },
            success: function(response) {
                tableContainer.html($(response).find('#machines-table').html());
                initDeleteButtons(); // Réinitialiser les events listeners
            },
            complete: function() {
                tableContainer.removeClass('opacity-50');
            }
        });
    }

    // Filtrage dynamique sur changement des select
    $('.filter-select').on('change', function() {
        loadMachines();
    });

    // Bouton appliquer les filtres
    $('#apply-filters').click(function() {
        loadMachines();
    });

    // Recherche en temps réel
    var searchTimeout;
    $('#search').on('keyup', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            loadMachines();
        }, 500); // Délai de 500ms avant de lancer la recherche
    });

    // Fonction d'initialisation des boutons de suppression
    function initDeleteButtons() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    }

    // Initialiser les boutons de suppression au chargement
    initDeleteButtons();
});
