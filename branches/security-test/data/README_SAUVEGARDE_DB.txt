Pour sauvegarder la DB :

01 - symfony doctrine:build-schema
02 - symfony doctrine:data-dump
03 - Rechercher/Remplacer SfGuard par sfGuard dans schema.yml et data.yml
04 - Remettre les code_dep des départements dans data.yml