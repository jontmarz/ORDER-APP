CREATE TABLE logs_2 (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  fecha DATETIME NULL,
  Evento VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE logs_2_has_producto_orden (
  logs_2_id INTEGER UNSIGNED NOT NULL,
  producto_orden_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(logs_2_id, producto_orden_id),
  INDEX logs_2_has_producto_orden_FKIndex1(logs_2_id),
  INDEX logs_2_has_producto_orden_FKIndex2(producto_orden_id),
  FOREIGN KEY(logs_2_id)
    REFERENCES logs_2(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(producto_orden_id)
    REFERENCES producto_orden(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE ordenes (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Fecha DATE NULL,
  orden_producto INTEGER UNSIGNED NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL,
  PRIMARY KEY(id)
);

CREATE TABLE ordenes_has_producto_orden (
  ordenes_id INTEGER UNSIGNED NOT NULL,
  producto_orden_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(ordenes_id, producto_orden_id),
  INDEX ordenes_has_producto_orden_FKIndex1(ordenes_id),
  INDEX ordenes_has_producto_orden_FKIndex2(producto_orden_id),
  FOREIGN KEY(ordenes_id)
    REFERENCES ordenes(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(producto_orden_id)
    REFERENCES producto_orden(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE producto_orden (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  producto INTEGER UNSIGNED NULL,
  orden INTEGER UNSIGNED NULL,
  event INTEGER UNSIGNED NULL,
  PRIMARY KEY(id)
);

CREATE TABLE products (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Name VARCHAR(20) NULL,
  description VARCHAR(255) NULL,
  valor DECIMAL NULL,
  producto_orden INTEGER UNSIGNED NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL,
  PRIMARY KEY(id)
);

CREATE TABLE products_has_producto_orden (
  products_id INTEGER UNSIGNED NOT NULL,
  producto_orden_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(products_id, producto_orden_id),
  INDEX products_has_producto_orden_FKIndex1(products_id),
  INDEX products_has_producto_orden_FKIndex2(producto_orden_id),
  FOREIGN KEY(products_id)
    REFERENCES products(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(producto_orden_id)
    REFERENCES producto_orden(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


