/*Codigo SQL para alimentar tipo_incidencias*/

INSERT INTO tipo_incidencias (`idTipo`, `nombre`, `gestiona`, `codEtapa`) VALUES (1, 'Aula de convivencia', 'C', 'ESO'),
  (2, 'Parte disciplinario', 'C', 'CFGS'),
  (3, 'Apercibimiento escrito', 'C', 'CFGS'),
  (4, 'No uniforme', 'T', 'BAC'),
  (5, 'No uniforme', 'T', 'ESO'),
  (6, 'Enfermedad', 'T', 'CFGS'),
  (7, 'Enfermedad', 'T', 'ESO'),
  (8, 'Expulsión al pasillo', 'T', 'ESO'),
  (9, 'Expulsión al pasillo', 'T', 'CFGS'),
  (10, 'Expulsión del centro', 'C', 'ESO'),
  (11, 'Expulsión del centro', 'C', 'BAC'),
  (12, 'Expulsión del centro', 'C', 'CFGS');

/*Codigo SQL para alimentar tipo_sancion*/

INSERT INTO `tipo_sancion` (`tipoSancion`, `nombre`) VALUES
  (1, 'Biblioteca'),
  (2, 'Parte disciplinario'),
  (3, 'Aula de convivencia'),
  (4, 'Expulado del centro'),
  (5, 'Trabajos comunitarios'),
(6, 'Séptima hora');

/*Codigo SQL para alimentar tipo_sancion_incidencias*/

INSERT INTO `tipo_sancion_incidencias` (`tipoSancion`, `idTipo`) VALUES
  (2, 2),
  (3, 3),
  (3, 1),
  (4,10),
  (4,11),
  (4,12);

INSERT INTO `tipos_anotaciones` (`tipoAnotacion`, `nombre`, `codEtapa`) VALUES
  (1, 'Expulsion', 'CFGS'),
  (2, 'Agresión en el aula', 'ESO'),
  (3, 'Agresión en el aula', 'CFGS'),
  (4, 'Agresión en el aula','BAC'),
  (5, 'Problemas con profesor','BAC'),
  (6, 'Problemas con profesor','ESO'),
  (7, 'Problemas con profesor','CFGS');

INSERT INTO `horas` (`idHora`, `nombre`) VALUES
  (1, '1 hora'),
  (2, '2 hora'),
  (3, '1 recreo'),
  (4, '3 hora'),
  (5, '4 hora'),
  (6, '2 recreo'),
  (7, '5 hora'),
  (8, '6 hora'),
  (9, '7 hora');

