-- MySQL dump 10.13  Distrib 5.5.53, for osx10.11 (x86_64)
--
-- Host: localhost    Database: inmx
-- ------------------------------------------------------
-- Server version	5.5.53

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ctiposemergencias`
--

DROP TABLE IF EXISTS `ctiposemergencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctiposemergencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_emergencia` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `prioridad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70109 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctiposemergencias`
--

LOCK TABLES `ctiposemergencias` WRITE;
/*!40000 ALTER TABLE `ctiposemergencias` DISABLE KEYS */;
INSERT INTO `ctiposemergencias` VALUES (10101,'ACCIDENTE ACUÁTICO CON LESIONADOS','ALTA\r'),(10102,'ACCIDENTE DE AERONAVE CON LESIONADOS','ALTA\r'),(10103,'ACCIDENTE DE MOTOCICLETA CON LESIONADOS','ALTA\r'),(10104,'ACCIDENTE DE VEHÍCULO AUTOMOTOR CON LESIONADOS','ALTA\r'),(10105,'ACCIDENTE FERROVIARIO CON LESIONADOS','ALTA\r'),(10106,'ACCIDENTE FERROVIARIO CON FALLECIDO','ALTA\r'),(10107,'ACCIDENTE MÚLTIPLE CON LESIONADOS','ALTA\r'),(10108,'ACCIDENTE MÚLTIPLE CON FALLECIDO','ALTA\r'),(10109,'ACCIDENTE DE VEHÍCULO DE PASAJEROS CON LESIONADOS','ALTA\r'),(10110,'ACCIDENTE DE VEHÍCULO DE PASAJEROS CON FALLECIDO','ALTA\r'),(10111,'ACCIDENTE DE MOTOCICLETA CON FALLECIDO','ALTA\r'),(10112,'ACCIDENTE DE VEHÍCULO AUTOMOTOR CON FALLECIDO','ALTA\r'),(10113,'ACCIDENTE DE AERONAVE CON FALLECIDO','ALTA\r'),(10114,'ACCIDENTE DE EMBARCACIONES CON LESIONADOS','ALTA\r'),(10115,'ACCIDENTE DE EMBARCACIONES CON FALLECIDO','ALTA\r'),(10116,'ATROPELLAMIENTO','ALTA\r'),(10117,'ACCIDENTE ACUÁTICO CON FALLECIDO','ALTA\r'),(10118,'ACCIDENTES CON MATERIALES PELIGROSOS','ALTA\r'),(10119,'ACCIDENTES CON MATERIALES RADIOACTIVOS','ALTA\r'),(10120,'ACCIDENTES CON RIESGO BIOLÓGICO INFECTO-CONTAGIOSO','ALTA\r'),(10121,'OTROS ACCIDENTES CON LESIONADOS','ALTA\r'),(10201,'AHOGAMIENTO','ALTA\r'),(10202,'AMPUTACIÓN','ALTA\r'),(10203,'ASFIXIA','ALTA\r'),(10204,'CAÍDA','ALTA\r'),(10205,'ELECTROCUTADO/LESIÓN POR CORRIENTE ELÉCTRICA','ALTA\r'),(10206,'FRACTURADO/TRAUMATISMO DE EXTREMIDADES','ALTA\r'),(10207,'HEMORRAGIA','ALTA\r'),(10208,'LESIONADO POR ARMA BLANCA','ALTA\r'),(10209,'LESIONADO POR PROYECTIL DE ARMA DE FUEGO','ALTA\r'),(10210,'MORDEDURA DE ANIMAL','ALTA\r'),(10211,'QUEMADURAS','ALTA\r'),(10212,'TRAUMATISMOS MÚLTIPLES','ALTA\r'),(10213,'TRAUMATISMO DE CRÁNEO','ALTA\r'),(10214,'TRAUMATISMO DE TÓRAX (PECHO Y/O ESPALDA)','ALTA\r'),(10215,'TRAUMATISMO ABDOMINAL','ALTA\r'),(10216,'TRAUMATISMO GENITAL Y/O URINARIO','ALTA\r'),(10217,'CONGELAMIENTO/LESIONADO POR CONDICIONES AMBIENTALES','ALTA\r'),(10218,'HIPOTERMIA','ALTA\r'),(10219,'FALLECIDO DE CAUSA TRAUMÁTICA','MEDIA\r'),(10220,'OTROS INCIDENTES MÉDICOS TRAUMÁTICOS','ALTA\r'),(10301,'TRABAJO DE PARTO','ALTA\r'),(10302,'AMENAZA DE ABORTO','ALTA\r'),(10303,'URGENCIA EN PACIENTE EMBARAZADA','ALTA\r'),(10304,'INFARTO CEREBRAL','ALTA\r'),(10305,'DIFICULTAD RESPIRATORIA/URGENCIA RESPIRATORIA','ALTA\r'),(10306,'INTOXICACIÓN ETÍLICA','ALTA\r'),(10307,'CONVULSIONES','ALTA\r'),(10308,'PERSONA INCONSCIENTE/URGENCIA NEUROLÓGICA','ALTA\r'),(10309,'ENVENENAMIENTO POR ANIMAL DE PONZOÑA','ALTA\r'),(10310,'URGENCIA POR ENFERMEDAD GENERAL','ALTA\r'),(10311,'DOLOR ABDOMINAL/URGENCIA ABDOMINAL','ALTA\r'),(10312,'DESCOMPENSACIÓN DE LA DIABETES/DESHIDRATACIÓN','ALTA\r'),(10313,'PARO CARDIORRESPIRATORIO','ALTA\r'),(10314,'INFARTO/URGENCIA CARDIOLÓGICA','ALTA\r'),(10315,'INTOXICACIÓN/SOBREDOSIS/ENVENENAMIENTO POR SUSTANCIAS','ALTA\r'),(10316,'OTROS INCIDENTES MÉDICOS CLÍNICOS','ALTA\r'),(10317,'FALLECIDO DE CAUSA NATURAL','BAJA\r'),(10318,'PERSONA EN CRISIS POR TRASTORNO MENTAL','MEDIA\r'),(10319,'EPIDEMIAS','ALTA\r'),(20101,'ACCIDENTE FERROVIARIO SIN LESIONADOS','MEDIA\r'),(20102,'ALMACENAMIENTO DE SUSTANCIAS PELIGROSAS','ALTA\r'),(20103,'ANIMAL PELIGROSO','ALTA\r'),(20104,'ANIMALES SUELTOS','MEDIA\r'),(20105,'FUGAS Y DERRAMES EN ESCUELA','ALTA\r'),(20106,'ENCHARCAMIENTO/ DESBORDAMIENTO DE RÍO','ALTA\r'),(20107,'EXPLOSIÓN','ALTA\r'),(20108,'FUGAS Y DERRAMES DE SUSTANCIAS QUÍMICAS','ALTA\r'),(20109,'HUNDIMIENTOS / AGRIETAMIENTOS/ INESTABILIDAD DE LADERA','ALTA\r'),(20110,'GASES TÓXICOS','MEDIA\r'),(20111,'OLORES FÉTIDOS','MEDIA\r'),(20112,'MATERIALES PELIGROSOS O RADIOACTIVOS (EXPOSICIÓN)','ALTA\r'),(20113,'CAÍDA DE ANUNCIO O ESPECTACULAR','MEDIA\r'),(20114,'TRANSPORTE DE SUSTANCIAS PELIGROSAS','ALTA\r'),(20201,'CONTAMINACIÓN DE SUELO- AIRE Y AGUA','ALTA\r'),(20202,'DERRUMBES','ALTA\r'),(20203,'ENJAMBRE DE ABEJAS','MEDIA\r'),(20204,'ERUPCIÓN O EMISIONES VOLCÁNICAS','ALTA\r'),(20205,'FRENTES FRÍOS- BAJAS TEMPERATURAS- NEVADAS Y HELADAS','ALTA\r'),(20206,'HURACANES','ALTA\r'),(20207,'INUNDACIONES','ALTA\r'),(20208,'PLAGAS','MEDIA\r'),(20209,'SISMO','ALTA\r'),(20210,'ÁRBOL CAÍDO O POR CAER','ALTA\r'),(20211,'TORMENTAS DE GRANIZO/DE NIEVE','ALTA\r'),(20212,'TORNADOS','ALTA\r'),(20213,'TSUNAMI','MEDIA\r'),(20214,'VIENTO/TORMENTA DE POLVO','MEDIA\r'),(20301,'INCENDIO DE CASA HABITACIÓN','ALTA\r'),(20302,'INCENDIO EN ESCUELA','ALTA\r'),(20303,'INCENDIO DE VEHÍCULO','ALTA\r'),(20304,'INCENDIO DE COMERCIO','ALTA\r'),(20305,'INCENDIO DE EDIFICIO','ALTA\r'),(20306,'INCENDIO A BORDO DE EMBARCACIÓN','ALTA\r'),(20307,'INCENDIO FORESTAL','ALTA\r'),(20308,'QUEMA URBANA','ALTA\r'),(20309,'QUEMA AGROPECUARIA','ALTA\r'),(20310,'INCENDIO DE FÁBRICA O INDUSTRIA','ALTA\r'),(20311,'OTROS INCENDIOS','ALTA\r'),(20401,'NAUFRAGIO/HUNDIMIENTO/VARADURA DE EMBARCACIÓN','ALTA\r'),(20402,'PERSONA ATRAPADA','ALTA\r'),(20403,'RESCATE ANIMAL','MEDIA\r'),(20404,'OTROS RESCATES','MEDIA\r'),(30101,'VEHÍCULO ABANDONADO','MEDIA\r'),(30102,'OBJETO SOSPECHOSO O PELIGROSO','MEDIA\r'),(30103,'PERSONA TIRADA EN VÍA PÚBLICA','MEDIA\r'),(30201,'DETONACIÓN DE EXPLOSIVOS','ALTA\r'),(30202,'DETONACIÓN DE ARMA DE FUEGO','ALTA\r'),(30203,'PERSONA ARMADA EN ESCUELA','ALTA\r'),(30204,'PORTACIÓN DE ARMAS O CARTUCHOS','MEDIA\r'),(30205,'DETONACIÓN DE COHETES O FUEGOS ARTIFICIALES','MEDIA\r'),(30206,'DETONACIÓN DE ARMA DE FUEGO EN ESCUELA','ALTA\r'),(30207,'TRÁFICO DE ARMAS','ALTA\r'),(30301,'AERONAVE SOSPECHOSA','MEDIA\r'),(30302,'ARRANCONES O CARRERAS DE VEHÍCULOS','MEDIA\r'),(30303,'BLOQUEO O CORTE DE VÍAS DE COMUNICACIÓN','MEDIA\r'),(30304,'CIRCULAR EN SENTIDO CONTRARIO','ALTA\r'),(30305,'VEHÍCULO A EXCESO DE VELOCIDAD','MEDIA\r'),(30306,'VEHÍCULO EN HUIDA','MEDIA\r'),(30307,'VEHÍCULO SOSPECHOSO','MEDIA\r'),(30308,'VEHÍCULO DESCOMPUESTO','MEDIA\r'),(30309,'ACCIDENTE DE TRÁNSITO SIN LESIONADOS','ALTA\r'),(30310,'OTRAS FALTAS A REGLAMENTO DE TRÁNSITO','BAJA\r'),(30401,'OTRAS ALARMAS DE EMERGENCIAS ACTIVADAS','ALTA\r'),(30402,'BOTÓN DE EMERGENCIA ACTIVADO','ALTA\r'),(30403,'CRISTALAZO O ROBO AL INTERIOR DE VEHÍCULO','ALTA\r'),(30404,'DAÑO A PROPIEDAD AJENA','MEDIA\r'),(30405,'DESPOJO','MEDIA\r'),(30406,'EXTORSIÓN','MEDIA\r'),(30407,'EXTORSIÓN TELEFÓNICA','MEDIA\r'),(30408,'ACTIVACIÓN DE ALARMA EN ESCUELA','MEDIA\r'),(30409,'ROBO DE COMBUSTIBLE O TOMA CLANDESTINA DE DUCTOS','ALTA\r'),(30410,'ROBO A CAJERO AUTOMÁTICO','MEDIA\r'),(30411,'ROBO DE AUTOPARTES O ACCESORIOS','MEDIA\r'),(30412,'ROBO DE GANADO','MEDIA\r'),(30413,'ROBO A CASA HABITACIÓN CON VIOLENCIA','ALTA\r'),(30414,'ROBO A CASA HABITACIÓN SIN VIOLENCIA','ALTA\r'),(30415,'ROBO A ESCUELA CON VIOLENCIA','ALTA\r'),(30416,'ROBO A ESCUELA SIN VIOLENCIA','MEDIA\r'),(30417,'ROBO A GASOLINERA CON VIOLENCIA','ALTA\r'),(30418,'ROBO A GASOLINERA SIN VIOLENCIA','MEDIA\r'),(30419,'ROBO A NEGOCIO CON VIOLENCIA','ALTA\r'),(30420,'ROBO A NEGOCIO SIN VIOLENCIA','MEDIA\r'),(30421,'ROBO A TRANSEÚNTE CON VIOLENCIA','ALTA\r'),(30422,'ROBO A TRANSEÚNTE SIN VIOLENCIA','MEDIA\r'),(30423,'ROBO EN TRANSPORTE PÚBLICO COLECTIVO CON VIOLENCIA','ALTA\r'),(30424,'ROBO EN TRANSPORTE PÚBLICO COLECTIVO SIN VIOLENCIA','MEDIA\r'),(30425,'ROBO EN TRANSPORTE PÚBLICO INDIVIDUAL CON VIOLENCIA','ALTA\r'),(30426,'ROBO EN TRANSPORTE PÚBLICO INDIVIDUAL SIN VIOLENCIA','MEDIA\r'),(30427,'ROBO A TRANSPORTISTA CON VIOLENCIA','ALTA\r'),(30428,'ROBO A TRANSPORTISTA SIN VIOLENCIA','MEDIA\r'),(30429,'ROBO DE VEHÍCULO PARTICULAR CON VIOLENCIA','ALTA\r'),(30430,'ROBO DE VEHÍCULO PARTICULAR SIN VIOLENCIA','MEDIA\r'),(30431,'ROBO EN CARRETERA CON VIOLENCIA','ALTA\r'),(30432,'ROBO EN CARRETERA SIN VIOLENCIA','ALTA\r'),(30433,'ROBO A BANCO CON VIOLENCIA','ALTA\r'),(30434,'ROBO A BANCO SIN VIOLENCIA','MEDIA\r'),(30435,'ROBO A CASA DE CAMBIO CON VIOLENCIA','ALTA\r'),(30436,'ROBO A CASA DE CAMBIO SIN VIOLENCIA','MEDIA\r'),(30437,'ROBO A EMPRESA DE TRASLADO DE VALORES CON VIOLENCIA','ALTA\r'),(30438,'ROBO A EMPRESA DE TRASLADO DE VALORES SIN VIOLENCIA','MEDIA\r'),(30439,'ROBO A FERROCARRIL','ALTA\r'),(30440,'ROBO DE PLACA','MEDIA\r'),(30441,'ROBO A TRANSPORTE ESCOLAR CON VIOLENCIA','ALTA\r'),(30442,'ROBO A TRANSPORTE ESCOLAR SIN VIOLENCIA','MEDIA\r'),(30443,'ROBO A EMBARCACIONES Y PIRATERÍA','MEDIA\r'),(30444,'TRANSPORTE ILEGAL DE COMBUSTIBLE','ALTA\r'),(30445,'ROBO DE ARTE SACRO','MEDIA\r'),(30446,'OTROS ACTOS RELACIONADOS CON EL PATRIMONIO','MEDIA\r'),(30501,'ABANDONO DE PERSONA','MEDIA\r'),(30502,'VIOLENCIA DE PAREJA','ALTA\r'),(30503,'VIOLENCIA FAMILIAR','ALTA\r'),(30504,'OTROS ACTOS RELACIONADOS CON LA FAMILIA','ALTA\r'),(30505,'MALTRATO INFANTIL','ALTA\r'),(30601,'MENOR EXTRAVIADO','ALTA\r'),(30602,'PERSONA NO LOCALIZADA','ALTA\r'),(30603,'PRIVACIÓN DE LA LIBERTAD','ALTA\r'),(30604,'REHENES','ALTA\r'),(30605,'ROBO DE INFANTE','ALTA\r'),(30606,'PERSONA DETENIDA','ALTA\r'),(30607,'SUSTRACCIÓN DE MENORES','ALTA\r'),(30608,'TRÁFICO DE MENORES','ALTA\r'),(30609,'OTROS ACTOS RELACIONADOS CON LA LIBERTAD PERSONAL','ALTA\r'),(30610,'TENTATIVA DE PRIVACIÓN DE LA LIBERTAD','MEDIA\r'),(30611,'NOTIFICACIÓN DE CIBER INCIDENTE','MEDIA\r'),(30701,'ABUSO SEXUAL','ALTA\r'),(30702,'ACOSO U HOSTIGAMIENTO SEXUAL','MEDIA\r'),(30703,'ATAQUES AL PUDOR','MEDIA\r'),(30704,'ESTUPRO','ALTA\r'),(30705,'EXPLOTACIÓN DE MENORES','ALTA\r'),(30706,'TRATA DE MENORES','ALTA\r'),(30707,'VIOLACIÓN','ALTA\r'),(30708,'OTROS ACTOS RELACIONADOS CON LA LIBERTAD Y LA SEGURIDAD SEXUAL','ALTA\r'),(30709,'TRATA DE PERSONAS','ALTA\r'),(30710,'TRÁFICO DE PERSONAS/INDOCUMENTADAS','ALTA\r'),(30711,'CORRUPCIÓN DE MENORES','ALTA\r'),(30801,'ACTOS DE COMERCIALIZACIÓN ILEGAL DE SANGRE- ÓRGANOS Y TEJIDOS HUMANOS','ALTA\r'),(30802,'ASOCIACIÓN DELICTUOSA O PANDILLERISMO','MEDIA\r'),(30803,'ENFRENTAMIENTO DE GRUPOS ARMADOS','ALTA\r'),(30804,'TERRORISMO O ATENTADO','ALTA\r'),(30805,'AMENAZA DE BOMBA','ALTA\r'),(30806,'OTROS ACTOS RELACIONADOS CON LA SEGURIDAD COLECTIVA','ALTA\r'),(30807,'MOTÍN','ALTA\r'),(30808,'VENTA CLANDESTINA DE PIROTECNIA- COHETES O FUEGOS ARTIFICIALES','MEDIA\r'),(30809,'VENTA ILEGAL DE COMBUSTIBLE','ALTA\r'),(30810,'AMENAZA DE BOMBA EN ESCUELA','ALTA\r'),(30901,'OTROS ACTOS RELACIONADOS CON LA VIDA Y LA INTEGRIDAD PERSONAL','ALTA\r'),(30902,'ACCIDENTE DE TRÁNSITO CON MUERTOS','ALTA\r'),(30903,'VIOLENCIA CONTRA LA MUJER','ALTA\r'),(30904,'PERSONA SOSPECHOSA','MEDIA\r'),(30905,'AMENAZA DE SUICIDIO','ALTA\r'),(30906,'HOMICIDIO','ALTA\r'),(30907,'PERSONA AGRESIVA','ALTA\r'),(30908,'SUICIDIO','ALTA\r'),(30909,'AGRESIÓN FÍSICA EN PANDILLA','ALTA\r'),(31001,'ALLANAMIENTO DE MORADA','MEDIA\r'),(31002,'AMENAZA','MEDIA\r'),(31003,'DAÑO A BIENES PÚBLICOS- INSTITUCIONES- MONUMENTOS- ENTRE OTROS','MEDIA\r'),(31004,'DESCARGA DE DESECHOS SIN PERMISOS','ALTA\r'),(31005,'ELECTORALES','MEDIA\r'),(31006,'FUGA DE REOS','ALTA\r'),(31007,'NARCOMENUDEO','ALTA\r'),(31008,'TOMA DE EDIFICIO PÚBLICO','ALTA\r'),(31009,'TOMA DE INSTALACIONES EDUCATIVAS CON VIOLENCIA','ALTA\r'),(31010,'TALA ILEGAL','ALTA\r'),(31011,'TRÁFICO DE MADERA','ALTA\r'),(31012,'TRAFICO Y/O VENTA CLANDESTINA DE ANIMALES','ALTA\r'),(31013,'TRÁFICO DE DROGAS Y ESTUPEFACIENTES EN LA MAR','ALTA\r'),(31014,'TRÁFICO DE DROGAS Y ESTUPEFACIENTES EN VÍA PÚBLICA','ALTA\r'),(31015,'OTROS ACTOS RELACIONADOS CON OTROS BIENES JURÍDICOS','MEDIA\r'),(31101,'ALTERACIÓN DEL ORDEN PÚBLICO POR PERSONA ALCOHOLIZADA','BAJA\r'),(31102,'ALTERACIÓN DEL ORDEN PÚBLICO POR PERSONA DROGADA','BAJA\r'),(31103,'CONDUCTOR EBRIO','BAJA\r'),(31104,'CONSUMO DE ALCOHOL EN VÍA PÚBLICA','BAJA\r'),(31105,'CONSUMO DE DROGAS EN VÍA PÚBLICA','BAJA\r'),(31106,'CONSUMO DE ALCOHOL EN ESCUELA','ALTA\r'),(31107,'CONSUMO DE DROGAS EN ESCUELA','ALTA\r'),(31108,'GRAFITIS','BAJA\r'),(31109,'MANIFESTACIÓN CON DISTURBIOS O BLOQUEOS','ALTA\r'),(31110,'MITIN','ALTA\r'),(31111,'PELEA CLANDESTINA CON ANIMALES','MEDIA\r'),(31112,'RIÑA/PELEA CLANDESTINA','ALTA\r'),(31113,'PERSONA EXHIBICIONISTA','BAJA\r'),(31114,'OTROS TIPOS DE ALTERACIÓN AL ORDEN PÚBLICO','BAJA\r'),(40101,'CAÍDA DE BARDA','MEDIA\r'),(40102,'CAÍDA DE POSTE','MEDIA\r'),(40103,'FALLA DE ALUMBRADO PÚBLICO','MEDIA\r'),(40104,'FALLAS DE SEMÁFORO','MEDIA\r'),(40105,'ALCANTARILLA SIN TAPA','MEDIA\r'),(40106,'CABLES COLGANDO','MEDIA\r'),(40107,'CORTO CIRCUITO','MEDIA\r'),(40108,'GRAVA SUELTA','MEDIA\r'),(40109,'AFECTACIÓN DE LOS SERVICIOS BÁSICOS O DE INFRAESTRUCTURA ESTRATÉGICA','ALTA\r'),(40110,'VIALIDAD EN MAL ESTADO','MEDIA\r'),(50101,'CONCENTRACIÓN PACÍFICA DE PERSONAS','BAJA\r'),(50102,'TENTATIVA DE ROBO','MEDIA\r'),(50103,'EXTRAVÍO DE PLACA','BAJA\r'),(50104,'FRAUDE','BAJA\r'),(50105,'RUIDO EXCESIVO','BAJA\r'),(50106,'USURPACIÓN DE IDENTIDAD','BAJA\r'),(50107,'ABUSO DE CONFIANZA','BAJA\r'),(50108,'ABUSO DE AUTORIDAD','MEDIA\r'),(50201,'RESTOS HUMANOS','MEDIA\r'),(50202,'DE ARMA','MEDIA\r'),(50203,'VEHÍCULO RECUPERADO','BAJA\r'),(50301,'APOYO A LA CIUDADANÍA','BAJA\r'),(50302,'PERSONA LOCALIZADA','BAJA\r'),(50303,'MALTRATO DE ANIMALES','MEDIA\r'),(50304,'PERSONA EN SITUACIÓN DE CALLE','BAJA\r'),(50305,'SOLICITUD DE RONDÍN','BAJA\r'),(50306,'QUEJA CONTRA SERVIDORES PÚBLICOS','BAJA\r'),(60101,'ALCANTARILLA OBSTRUIDA','BAJA\r'),(60102,'ANIMAL MUERTO','BAJA\r'),(60103,'SOLICITUD DE OTROS SERVICIOS PÚBLICOS','BAJA\r'),(70101,'LLAMADA DE BROMA POR NIÑOS','BAJA\r'),(70102,'LLAMADA DE PRUEBA','BAJA\r'),(70103,'LLAMADA INCOMPLETA','BAJA\r'),(70104,'LLAMADA MUDA','BAJA\r'),(70105,'TRANSFERENCIA DE LLAMADA','BAJA\r'),(70106,'INSULTOS POR ADULTOS/LLAMADA OBSCENA','BAJA\r'),(70107,'JÓVENES/ADULTOS JUGANDO','BAJA\r'),(70108,'OTRAS LLAMADAS IMPROCEDENTES','BAJA');
/*!40000 ALTER TABLE `ctiposemergencias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-02 13:49:19
