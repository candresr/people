--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: attachment; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE attachment (
    attachment_id bigint NOT NULL,
    template_row_id bigint NOT NULL,
    type smallint NOT NULL,
    erased boolean DEFAULT false
);


ALTER TABLE attachment OWNER TO postgres;

--
-- Name: COLUMN attachment.attachment_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN attachment.attachment_id IS 'adjuntos de los evaluados';


--
-- Name: COLUMN attachment.type; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN attachment.type IS '1: identity 2: bank certificate 3...?';


--
-- Name: attachment_attachment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE attachment_attachment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE attachment_attachment_id_seq OWNER TO postgres;

--
-- Name: attachment_attachment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE attachment_attachment_id_seq OWNED BY attachment.attachment_id;


--
-- Name: availability; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE availability (
    availability_id integer NOT NULL,
    professional_id integer NOT NULL,
    day smallint NOT NULL,
    start_time time without time zone NOT NULL,
    end_time time without time zone NOT NULL,
    erased boolean DEFAULT false
);


ALTER TABLE availability OWNER TO postgres;

--
-- Name: availability_availability_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE availability_availability_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE availability_availability_id_seq OWNER TO postgres;

--
-- Name: availability_availability_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE availability_availability_id_seq OWNED BY availability.availability_id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categories (
    categories_id integer NOT NULL,
    key character varying(50),
    value character varying(50),
    category character varying(100),
    erased boolean DEFAULT false
);


ALTER TABLE categories OWNER TO postgres;

--
-- Name: categories_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categories_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categories_categories_id_seq OWNER TO postgres;

--
-- Name: categories_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categories_categories_id_seq OWNED BY categories.categories_id;


--
-- Name: client; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE client (
    client_id integer NOT NULL,
    balance numeric DEFAULT 0 NOT NULL,
    created_date date DEFAULT now() NOT NULL,
    created_time time without time zone DEFAULT now() NOT NULL,
    tradename character varying(100),
    business_name character varying(100),
    identification_type character varying(100),
    identification_number integer,
    country character varying(100),
    department character varying(100),
    city character varying(100),
    web_page character varying(100),
    payment_method character varying(100),
    address character varying(200),
    users_id integer,
    erased boolean DEFAULT false
);


ALTER TABLE client OWNER TO postgres;

--
-- Name: client_client_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE client_client_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE client_client_id_seq OWNER TO postgres;

--
-- Name: client_client_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE client_client_id_seq OWNED BY client.client_id;


--
-- Name: document; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE document (
    document_id bigint NOT NULL,
    professional_id integer NOT NULL,
    type smallint NOT NULL,
    created_date date DEFAULT ('now'::text)::date NOT NULL,
    created_time time without time zone DEFAULT ('now'::text)::time with time zone NOT NULL,
    userfile text NOT NULL,
    ranking character varying(50),
    erased boolean DEFAULT false
);


ALTER TABLE document OWNER TO postgres;

--
-- Name: COLUMN document.type; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN document.type IS '0: reporte de servicio 1: factura 2: seguridad social 3: cuenta de cobro';


--
-- Name: COLUMN document.ranking; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN document.ranking IS 'if type == 0: ranked by quicker about service';


--
-- Name: document_document_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE document_document_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE document_document_id_seq OWNER TO postgres;

--
-- Name: document_document_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE document_document_id_seq OWNED BY document.document_id;


--
-- Name: document_professional_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE document_professional_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE document_professional_id_seq OWNER TO postgres;

--
-- Name: document_professional_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE document_professional_id_seq OWNED BY document.professional_id;


--
-- Name: groups; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE groups (
    id integer NOT NULL,
    name character varying(20) NOT NULL,
    description character varying(100) NOT NULL,
    erased boolean DEFAULT false,
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE groups OWNER TO postgres;

--
-- Name: groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE groups_id_seq OWNER TO postgres;

--
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE groups_id_seq OWNED BY groups.id;


--
-- Name: login_attempts; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE login_attempts (
    id integer NOT NULL,
    ip_address character varying(15),
    login character varying(100) NOT NULL,
    "time" integer,
    erased boolean DEFAULT false,
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE login_attempts OWNER TO postgres;

--
-- Name: login_attempts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE login_attempts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE login_attempts_id_seq OWNER TO postgres;

--
-- Name: login_attempts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE login_attempts_id_seq OWNED BY login_attempts.id;


--
-- Name: menu; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE menu (
    menu_id integer NOT NULL,
    link character varying(250),
    belongs integer,
    tittle character varying(100),
    type integer,
    erased boolean DEFAULT false
);


ALTER TABLE menu OWNER TO postgres;

--
-- Name: menu_menu_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE menu_menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE menu_menu_id_seq OWNER TO postgres;

--
-- Name: menu_menu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE menu_menu_id_seq OWNED BY menu.menu_id;


--
-- Name: messages; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE messages (
    messages_id integer NOT NULL,
    subject character varying(200),
    body text,
    answer text,
    created_time time without time zone DEFAULT ('now'::text)::time with time zone,
    status integer DEFAULT 0,
    users_id integer,
    created_date date DEFAULT ('now'::text)::date,
    erased boolean DEFAULT false
);


ALTER TABLE messages OWNER TO postgres;

--
-- Name: messages_messages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE messages_messages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE messages_messages_id_seq OWNER TO postgres;

--
-- Name: messages_messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE messages_messages_id_seq OWNED BY messages.messages_id;


--
-- Name: professional; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE professional (
    professional_id integer NOT NULL,
    is_available boolean NOT NULL,
    identification_type character varying(50),
    identification_number integer,
    expedition_date date,
    birth_place character varying(50),
    birth_date date,
    address character varying(150),
    city character varying(50),
    department character varying(50),
    charge_applies character varying(50),
    userfile character varying(50),
    users_id integer,
    erased boolean DEFAULT false
);


ALTER TABLE professional OWNER TO postgres;

--
-- Name: professional_professional_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE professional_professional_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE professional_professional_id_seq OWNER TO postgres;

--
-- Name: professional_professional_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE professional_professional_id_seq OWNED BY professional.professional_id;


--
-- Name: questions; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE questions (
    questions_id integer NOT NULL,
    tittle character varying(150),
    description text,
    active boolean,
    created_date date,
    erased boolean DEFAULT false
);


ALTER TABLE questions OWNER TO postgres;

--
-- Name: questions_questions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE questions_questions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE questions_questions_id_seq OWNER TO postgres;

--
-- Name: questions_questions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE questions_questions_id_seq OWNED BY questions.questions_id;


--
-- Name: quicker; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE quicker (
    quicker_id integer NOT NULL,
    name text NOT NULL,
    lastname text,
    email text,
    password text,
    erased boolean DEFAULT false
);


ALTER TABLE quicker OWNER TO postgres;

--
-- Name: quicker_quicker_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE quicker_quicker_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE quicker_quicker_id_seq OWNER TO postgres;

--
-- Name: quicker_quicker_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE quicker_quicker_id_seq OWNED BY quicker.quicker_id;


--
-- Name: schema_tables; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE schema_tables (
    schema_tables_id integer NOT NULL,
    column_name character varying(50),
    column_type character varying(50),
    tittle character varying(50),
    is_visible boolean,
    table_name character varying(50),
    "order" integer,
    rules character varying(250),
    category character varying(100),
    search boolean,
    erased boolean DEFAULT false
);


ALTER TABLE schema_tables OWNER TO postgres;

--
-- Name: schema_tables_schema_tables_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE schema_tables_schema_tables_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE schema_tables_schema_tables_id_seq OWNER TO postgres;

--
-- Name: schema_tables_schema_tables_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE schema_tables_schema_tables_id_seq OWNED BY schema_tables.schema_tables_id;


--
-- Name: service; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE service (
    service_id uuid NOT NULL,
    professional_id integer,
    template_row_id bigint NOT NULL,
    type smallint NOT NULL,
    status smallint DEFAULT 0 NOT NULL,
    priority smallint NOT NULL,
    start_date date,
    start_time time without time zone,
    end_date date,
    end_time time without time zone,
    created_date date NOT NULL,
    created_time time without time zone NOT NULL,
    address text,
    neighborhood text,
    coordinates text,
    stratification smallint,
    info text,
    report_id bigint,
    bill_id bigint,
    erased boolean DEFAULT false
);


ALTER TABLE service OWNER TO postgres;

--
-- Name: COLUMN service.type; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN service.type IS '1: ref_personal 2: ref_financiera 3: visita_domiciliaria  41: poligrafo pre empleo 42: poligrafo rutina 43: poligrafo especifico  51: examen optometria 52: examen visiometria 53: examen audiometria 54: examen espirometria 55: examen frotis de garganta 56: examen KOH 57: examen glicemia 58: examen colesterol 59: examen trigliceridos 60: examen osteomuscular';


--
-- Name: COLUMN service.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN service.status IS '0: nonaccepted 1: accepted 2: rejectedbyProfessional 3: rejectdbyClient 4: confirmed 5: inProcess 6: finished 7: canceledbyClient 8: success';


--
-- Name: COLUMN service.priority; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN service.priority IS '1: first ... n: last';


--
-- Name: COLUMN service.coordinates; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN service.coordinates IS 'lat;long';


--
-- Name: COLUMN service.report_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN service.report_id IS 'professional_document  informe subido por profesional';


--
-- Name: COLUMN service.bill_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN service.bill_id IS 'professional_document  factura de pago?';


--
-- Name: service_attachment; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE service_attachment (
    service_id uuid NOT NULL,
    attachment_id bigint NOT NULL,
    erased boolean DEFAULT false
);


ALTER TABLE service_attachment OWNER TO postgres;

--
-- Name: structure_tables; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE structure_tables (
    structure_id integer NOT NULL,
    name_table character varying(100),
    title character varying(150),
    url character varying(200),
    erased boolean DEFAULT false
);


ALTER TABLE structure_tables OWNER TO postgres;

--
-- Name: structure_table_structure_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE structure_table_structure_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE structure_table_structure_id_seq OWNER TO postgres;

--
-- Name: structure_table_structure_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE structure_table_structure_id_seq OWNED BY structure_tables.structure_id;


--
-- Name: template; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE template (
    template_id integer NOT NULL,
    client_id integer NOT NULL,
    is_corporative boolean NOT NULL,
    created_date date DEFAULT ('now'::text)::date NOT NULL,
    created_time time without time zone DEFAULT ('now'::text)::time with time zone NOT NULL,
    erased boolean DEFAULT false
);


ALTER TABLE template OWNER TO postgres;

--
-- Name: COLUMN template.is_corporative; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN template.is_corporative IS 'false: talento humano true: asociados de negocio';


--
-- Name: template_row; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE template_row (
    template_row_id integer NOT NULL,
    client_id integer,
    name text NOT NULL,
    lastname text,
    identity text,
    area text,
    phone text,
    email text,
    city text,
    userfile character varying(100),
    is_corporative boolean,
    erased boolean DEFAULT false
);


ALTER TABLE template_row OWNER TO postgres;

--
-- Name: COLUMN template_row.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN template_row.name IS 'razon social: if template_id.iscoporative';


--
-- Name: COLUMN template_row.lastname; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN template_row.lastname IS 'contact_name: if template_id.iscoporative';


--
-- Name: COLUMN template_row.identity; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN template_row.identity IS 'nit: if template_id.iscoporative';


--
-- Name: COLUMN template_row.area; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN template_row.area IS 'area dentro de la empresa';


--
-- Name: template_row_template_row_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE template_row_template_row_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE template_row_template_row_id_seq OWNER TO postgres;

--
-- Name: template_row_template_row_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE template_row_template_row_id_seq OWNED BY template_row.template_row_id;


--
-- Name: template_template_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE template_template_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE template_template_id_seq OWNER TO postgres;

--
-- Name: template_template_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE template_template_id_seq OWNED BY template.template_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    users_id integer NOT NULL,
    username character varying(100),
    password character varying(255) NOT NULL,
    email character varying(100) NOT NULL,
    active integer,
    first_name character varying(50),
    last_name character varying(50),
    user_type integer,
    phone character varying(20),
    erased boolean DEFAULT false,
    CONSTRAINT check_active CHECK ((active >= 0)),
    CONSTRAINT check_id CHECK ((users_id >= 0))
);


ALTER TABLE users OWNER TO postgres;

--
-- Name: users_groups; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users_groups (
    id integer NOT NULL,
    user_id integer NOT NULL,
    group_id integer NOT NULL,
    erased boolean DEFAULT false,
    CONSTRAINT users_groups_check_group_id CHECK ((group_id >= 0)),
    CONSTRAINT users_groups_check_id CHECK ((id >= 0)),
    CONSTRAINT users_groups_check_user_id CHECK ((user_id >= 0))
);


ALTER TABLE users_groups OWNER TO postgres;

--
-- Name: users_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_groups_id_seq OWNER TO postgres;

--
-- Name: users_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_groups_id_seq OWNED BY users_groups.id;


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.users_id;


--
-- Name: works_us; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE works_us (
    works_us_id integer NOT NULL,
    name character varying(100),
    lastname character varying(100),
    identity_card integer,
    phone character varying(20),
    email character varying(100),
    userfile character varying,
    erased boolean DEFAULT false
);


ALTER TABLE works_us OWNER TO postgres;

--
-- Name: works_us_works_us_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE works_us_works_us_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE works_us_works_us_id_seq OWNER TO postgres;

--
-- Name: works_us_works_us_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE works_us_works_us_id_seq OWNED BY works_us.works_us_id;


--
-- Name: attachment_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY attachment ALTER COLUMN attachment_id SET DEFAULT nextval('attachment_attachment_id_seq'::regclass);


--
-- Name: availability_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY availability ALTER COLUMN availability_id SET DEFAULT nextval('availability_availability_id_seq'::regclass);


--
-- Name: categories_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categories ALTER COLUMN categories_id SET DEFAULT nextval('categories_categories_id_seq'::regclass);


--
-- Name: client_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY client ALTER COLUMN client_id SET DEFAULT nextval('client_client_id_seq'::regclass);


--
-- Name: document_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY document ALTER COLUMN document_id SET DEFAULT nextval('document_document_id_seq'::regclass);


--
-- Name: professional_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY document ALTER COLUMN professional_id SET DEFAULT nextval('document_professional_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY groups ALTER COLUMN id SET DEFAULT nextval('groups_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY login_attempts ALTER COLUMN id SET DEFAULT nextval('login_attempts_id_seq'::regclass);


--
-- Name: menu_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY menu ALTER COLUMN menu_id SET DEFAULT nextval('menu_menu_id_seq'::regclass);


--
-- Name: messages_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY messages ALTER COLUMN messages_id SET DEFAULT nextval('messages_messages_id_seq'::regclass);


--
-- Name: professional_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY professional ALTER COLUMN professional_id SET DEFAULT nextval('professional_professional_id_seq'::regclass);


--
-- Name: questions_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY questions ALTER COLUMN questions_id SET DEFAULT nextval('questions_questions_id_seq'::regclass);


--
-- Name: quicker_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY quicker ALTER COLUMN quicker_id SET DEFAULT nextval('quicker_quicker_id_seq'::regclass);


--
-- Name: schema_tables_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY schema_tables ALTER COLUMN schema_tables_id SET DEFAULT nextval('schema_tables_schema_tables_id_seq'::regclass);


--
-- Name: structure_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY structure_tables ALTER COLUMN structure_id SET DEFAULT nextval('structure_table_structure_id_seq'::regclass);


--
-- Name: template_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY template ALTER COLUMN template_id SET DEFAULT nextval('template_template_id_seq'::regclass);


--
-- Name: template_row_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY template_row ALTER COLUMN template_row_id SET DEFAULT nextval('template_row_template_row_id_seq'::regclass);


--
-- Name: users_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN users_id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users_groups ALTER COLUMN id SET DEFAULT nextval('users_groups_id_seq'::regclass);


--
-- Name: works_us_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY works_us ALTER COLUMN works_us_id SET DEFAULT nextval('works_us_works_us_id_seq'::regclass);


--
-- Data for Name: attachment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY attachment (attachment_id, template_row_id, type, erased) FROM stdin;
\.


--
-- Name: attachment_attachment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('attachment_attachment_id_seq', 1, false);


--
-- Data for Name: availability; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY availability (availability_id, professional_id, day, start_time, end_time, erased) FROM stdin;
1	1	3	16:30:00	16:30:00	f
2	1	6	16:50:00	16:50:00	f
3	4	2	16:25:00	16:30:00	f
4	4	4	16:30:00	16:35:00	f
5	4	6	16:35:00	16:40:00	f
\.


--
-- Name: availability_availability_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('availability_availability_id_seq', 5, true);


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categories (categories_id, key, value, category, erased) FROM stdin;
1	psicologo	Psicologo	cargo	f
2	trabajador_social	Trabajador Social	cargo	f
3	poligrafista	Poligrafista	cargo	f
4	1	Lunes	dias	f
5	2	Martes	dias	f
6	3	Miercoles	dias	f
7	4	Jueves	dias	f
8	5	Viernes	dias	f
9	6	Sabado	dias	f
10	7	Domingo	dias	f
14	1	Asociados Negocio	corporative	f
15	2	Talento Humano	corporative	f
16	2	Seguridad Social	document	f
17	1	Factura	document	f
18	0	Reporte de Servicio	document	f
11	2	Cliente	user_type	f
12	3	Ips	user_type	f
13	4	Profesional	user_type	f
\.


--
-- Name: categories_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categories_categories_id_seq', 18, true);


--
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY client (client_id, balance, created_date, created_time, tradename, business_name, identification_type, identification_number, country, department, city, web_page, payment_method, address, users_id, erased) FROM stdin;
1	1000000	2016-05-14	21:42:31.042413	tattoo	tattoo	nit	1234567	colombia	bolivar	caratagena	www.tattoo.com	cheque	el bosque	7	f
2	10000	2016-05-16	10:26:17.649647	algo	algomas	NIT	1234567	colombia	cundi	bogota	www.algo.com	cheque	centro	10	f
3	10000000	2016-05-16	10:30:03.878585	gym	gym	cedula	12345678	coombia	cundi	bogota	www.gym.com	cheque	centro	8	f
\.


--
-- Name: client_client_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('client_client_id_seq', 3, true);


--
-- Data for Name: document; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY document (document_id, professional_id, type, created_date, created_time, userfile, ranking, erased) FROM stdin;
2	7	2	2016-05-23	14:06:16.810195	PagoAsistidoMayo16.pdf	\N	f
\.


--
-- Name: document_document_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('document_document_id_seq', 2, true);


--
-- Name: document_professional_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('document_professional_id_seq', 1, false);


--
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY groups (id, name, description, erased) FROM stdin;
1	admin	Administrator	f
2	client	Clientes General 	f
4	professional	Profesional	f
\.


--
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('groups_id_seq', 4, true);


--
-- Data for Name: login_attempts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY login_attempts (id, ip_address, login, "time", erased) FROM stdin;
\.


--
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('login_attempts_id_seq', 1, false);


--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY menu (menu_id, link, belongs, tittle, type, erased) FROM stdin;
1	web/generic/template/inputservice	2	Solicitud Servicios	1	f
2	web/generic/availability/scheduling	4	Agenda	1	f
3	web/generic/template_row/formsearch	2	Casos Gestion Cliente	1	f
4	web/generic/template_row/formsearch	2	Historial de Servicios	1	f
5	web/generic/document/form	4	Facturacion	1	f
6	web/generic/document/formsearch	4	Historial Facturacion	1	f
7	web/generic/messages/inputservice	4	Mensajes	1	f
\.


--
-- Name: menu_menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('menu_menu_id_seq', 8, true);


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY messages (messages_id, subject, body, answer, created_time, status, users_id, created_date, erased) FROM stdin;
1	prueba 1	prueba mensaje 1 user andres@correo.com	\N	14:40:16.723967	0	3	2016-05-26	f
3	Admin	Testing message service	\N	15:06:27.436769	0	7	2016-05-26	f
2	prueba	esto es una prueba	\N	14:40:16.723967	0	7	2016-05-26	f
4	A quien le interese	Esta prueba está  dirigida a la gente que le interese leerla	\N	18:50:50.266193	0	7	2016-05-26	f
\.


--
-- Name: messages_messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('messages_messages_id_seq', 4, true);


--
-- Data for Name: professional; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY professional (professional_id, is_available, identification_type, identification_number, expedition_date, birth_place, birth_date, address, city, department, charge_applies, userfile, users_id, erased) FROM stdin;
1	t		0	0001-01-01		0001-01-01 BC					license-mit.txt	\N	f
3	t	s	12	0001-12-01	aa	0001-03-16 BC	s	s	s	s	license-mit.txt	\N	f
4	t	cedula	1235000111	2016-05-09	Armenia	1977-04-16	fontibon	bogota	bogota	poligrafista	Formularios_people.pdf	\N	f
5	t	cedula	1234567	2016-10-05	colombia	1997-06-05	sur	bogota	cundi	psicologo	Afiliacion_al_Sistema_General_de_Pensiones2.pdf	11	f
6	t	cedula	1234567	2016-01-04	coombia	1986-05-13	sur	cali	cauca	trabajador_social	Formularios_people9.pdf	9	f
7	t	Cedula	12345678	2016-04-05	armenia	2006-04-16	fontibon	bogota	cundi	trabajador_social	Formularios_people11.pdf	3	f
8	t	CC	1234567	2016-05-19	caracas	2016-05-12	caracas	caracas	caracas	poligrafista	antecedentes.pdf	12	f
\.


--
-- Name: professional_professional_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('professional_professional_id_seq', 8, true);


--
-- Data for Name: questions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY questions (questions_id, tittle, description, active, created_date, erased) FROM stdin;
1	Pregunta 1	Respuesta 1	t	2016-05-25	f
2	Pregunta 2	Respuesta 2	t	2016-05-25	f
3	Pregunta 3	Respuesta 3	t	2016-05-25	f
4	Pregunta 4	Respuesta 4	t	2016-05-25	f
\.


--
-- Name: questions_questions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('questions_questions_id_seq', 4, true);


--
-- Data for Name: quicker; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY quicker (quicker_id, name, lastname, email, password, erased) FROM stdin;
\.


--
-- Name: quicker_quicker_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('quicker_quicker_id_seq', 1, false);


--
-- Data for Name: schema_tables; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY schema_tables (schema_tables_id, column_name, column_type, tittle, is_visible, table_name, "order", rules, category, search, erased) FROM stdin;
64	username	varchar	Username	f	users	2	\N	\N	\N	f
78	service_id	hidden	\N	f	service	1	\N	\N	\N	f
80	template_row_id	hidden	\N	f	service	3	\N	\N	\N	f
44	name	varchar	Nombre	t	template_row	3	trim|required	\N	t	f
45	lastname	varchar	Apellido	t	template_row	4	trim|required	\N	t	f
46	area	varchar	Cargo	t	template_row	6	\N	\N	t	f
47	phone	varchar	Telefono	t	template_row	7	trim|required	\N	f	f
48	email	varchar	Correo	t	template_row	8	trim|required|valid_email	\N	t	f
49	city	varchar	Cuidad	t	template_row	9	trim|required	\N	t	f
43	client_id	hidden_id	\N	t	template_row	12	\N	\N	f	f
76	identity	varchar	NIT	t	template_row	5			t	f
77	is_corporative	hidden		t	template_row	11			f	f
50	userfile	upload	\N	t	template_row	10	\N	\N	f	f
84	ranking	hidden	Ranking	f	document	5			\N	f
90	created_time	hour	Hora Creacion	f	document	6	\N	\N	t	f
85	userfile	upload	Documento	t	document	4	callback_do_upload		t	f
87	professional_id	hidden	Id Profesional	f	document	2			f	f
86	type	combobox	Tipo Documento	t	document	3	trim|required	document	f	f
89	created_date	date	Fecha Creacion	f	document	5	\N	\N	t	f
102	status	boolean	Estatus	f	messages	7	\N	\N	t	f
101	created_time	time	Hora	t	messages	6	\N	\N	f	f
97	subject	varchar	Asunto	t	messages	2	trim|required	\N	t	f
98	body	text	Comentario	t	messages	3	trim|required	\N	t	f
81	type	integer	Tipo	t	service	4	\N	\N	t	f
58	professional_id	hidden	Profesional	f	availability	2	\N	\N	t	f
103	users_id	hidden	Id user	f	messages	8	\N	\N	f	f
100	created_date	date	Fecha	f	messages	5	trim|required	\N	t	f
67	email	varchar	Correo	t	users	5	trim|required|valid_email|is_unique[users.email]	\N	t	f
68	active	boolean	active	f	users	6	\N	\N	t	f
69	first_name	varchar	Nombre	t	users	7	trim|required	\N	t	f
70	last_name	varchar	Apellidos	t	users	8	trim|required	\N	t	f
71	user_type	combobox	Tipos Usuario	t	users	9	trim|required	user_type	t	f
72	phone	varchar	Telefono	t	users	10	trim|required	\N	t	f
66	password	password	Contraseña	t	users	11	trim|required	\N	f	f
82	status	integer	Estatus	t	service	5	\N	\N	t	f
83	priority	integer	Prioridad	t	service	6	\N	\N	t	f
79	professional_id	hidden	\N	f	service	2	\N	\N	t	f
92	tittle	varchar	Titulo	t	questions	2	\N	\N	t	f
93	description	varchar	Descripcion	t	questions	3	\N	\N	t	f
94	created_date	date	Fecha	t	questions	4	\N	\N	t	f
95	active	boolean	Activa	t	questions	5	\N	\N	t	f
52	name	varchar	Nombre	t	works_us	2	trim|required	\N	t	f
53	lastname	varchar	Apellido	t	works_us	3	trim|required	\N	t	f
54	identity_card	integer	Cedula	t	works_us	4	trim|required	\N	t	f
55	phone	varchar	Telefono	t	works_us	5	trim|required	\N	t	f
56	email	varchar	Correo	t	works_us	6	trim|required|valid_email	\N	t	f
57	userfile	upload	Hoja de Vida	t	works_us	7	callback_do_upload	\N	t	f
3	tradename	varchar	Nombre comercial	t	client	2	trim|required	\N	t	f
4	business_name	varchar	Razón social	t	client	3	trim|required	\N	t	f
5	identification_type	varchar	Tipo Identificación	t	client	4	trim|required	\N	t	f
7	country	varchar	País	t	client	6	trim|required	\N	t	f
8	department	varchar	Departamento	t	client	7	trim|required	\N	t	f
9	city	varchar	Ciudad	t	client	8	trim|required	\N	t	f
10	address	varchar	Dirección	t	client	9	trim|required	\N	t	f
14	web_page	varchar	Página web	t	client	13	trim|required	\N	t	f
15	payment_method	varchar	Medio de pago 	t	client	14	trim|required	\N	t	f
16	balance	numeric	Balance	t	client	15	trim|required	\N	t	f
22	identification_type	varchar	Tipo documento	t	professional	6	trim|required	\N	t	f
23	identification_number	integer	Número documento	t	professional	7	trim|required	\N	t	f
24	expedition_date	date	Fecha Expedición	t	professional	8	trim|required	\N	t	f
25	birth_place	varchar	Lugar nacimiento	t	professional	9	trim|required	\N	t	f
26	birth_date	date	Fecha nacimiento	t	professional	10	trim|required	\N	t	f
27	address	varchar	Dirección 	t	professional	11	trim|required	\N	t	f
28	city	varchar	Ciudad	t	professional	12	trim|required	\N	t	f
29	department	varchar	Departamento	t	professional	13	trim|required	\N	t	f
30	charge_applies	combobox	Cargo al que aplica	t	professional	14	trim|required	cargo	t	f
31	userfile	upload	Adjuntar hoja de vida	t	professional	15	callback_do_upload	\N	t	f
32	is_available	boolean	Disponibilidad 	t	professional	16	trim|required	\N	t	f
60	start_time	hour	Hora Incio	t	availability	4	trim|required	\N	t	f
61	end_time	hour	Hora Fin	t	availability	5	trim|required	\N	t	f
99	answer	text	Respuesta	t	messages	4	\N	\N	t	f
2	client_id	integer	Id	f	client	1	\N	\N	t	f
59	day	combobox	Dia	t	availability	3	trim|required	\N	t	f
17	professional_id	integer	Id	f	professional	1	\N	\N	t	f
42	template_row_id	hidden	Id	f	template_row	1	\N	\N	t	f
51	works_us_id	hidden	Id	f	works_us	1	\N	\N	t	f
63	users_id	hidden	Id	f	users	1	\N	\N	t	f
74	client_id	integer	Id	t	template	1		\N	t	f
88	document_id	hidden	Id	f	document	1	\N	\N	t	f
91	questions_id	hidden	Id	f	questions	1	\N	\N	t	f
96	messages_id	hidden	Id	f	messages	1	\N	\N	t	f
6	identification_number	integer	Numero Identificación	t	client	5	trim|required	\N	t	f
104	availability_id	hidden	Id	f	availability	1	\N	\N	t	f
\.


--
-- Name: schema_tables_schema_tables_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('schema_tables_schema_tables_id_seq', 104, true);


--
-- Data for Name: service; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY service (service_id, professional_id, template_row_id, type, status, priority, start_date, start_time, end_date, end_time, created_date, created_time, address, neighborhood, coordinates, stratification, info, report_id, bill_id, erased) FROM stdin;
\.


--
-- Data for Name: service_attachment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY service_attachment (service_id, attachment_id, erased) FROM stdin;
\.


--
-- Name: structure_table_structure_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('structure_table_structure_id_seq', 10, true);


--
-- Data for Name: structure_tables; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY structure_tables (structure_id, name_table, title, url, erased) FROM stdin;
1	users	Usuarios	admin/listAll	f
2	service	Servicios	admin/listAll	f
3	questions	Prefuntas Frecuentes	admin/listAll	f
4	works_us	Trabaje con Nosotros	admin/listAll	f
5	messages	Mensajes	admin/listAll	f
6	template_row	Plantillas	admin/listAll	f
7	client	Clientes	admin/listAll	f
8	professional	Profesionales	admin/listAll	f
9	document	Documentos	admin/listAll	f
10	availability	Disponibilidad	admin/listAll	f
\.


--
-- Data for Name: template; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY template (template_id, client_id, is_corporative, created_date, created_time, erased) FROM stdin;
\.


--
-- Data for Name: template_row; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY template_row (template_row_id, client_id, name, lastname, identity, area, phone, email, city, userfile, is_corporative, erased) FROM stdin;
1	3	Juan	perez	\N	administrador	3123342211	jesus@correo.com	bogota	\N	t	f
2	3	rossrumba	ross	12345678	\N	3124452233	ross@correo.com	cali	\N	t	f
3	1	rossrumba2	ross	123456789	\N	3125564433	ross@correo.com	cali	\N	f	f
5	1	cesar	ramirez	\N	developer	3124457788	candres@correo.com	Bogota	\N	f	f
\.


--
-- Name: template_row_template_row_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('template_row_template_row_id_seq', 5, true);


--
-- Name: template_template_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('template_template_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (users_id, username, password, email, active, first_name, last_name, user_type, phone, erased) FROM stdin;
1	administrator	d033e22ae348aeb5660fc2140aec35850c4da997	admin@admin.com	1	Admin	istrator	2	0	f
8	\N	b1b3773a05c0ed0176787a4f1574ff0075f7521e	jacke@correo.com	\N	jacke	ramirez	2	3114457117	f
12	\N	b1b3773a05c0ed0176787a4f1574ff0075f7521e	candres@correo.com	\N	cesar andres	ramirez	4	3132216655	f
24	coperfyll	7c4a8d09ca3762af61e59520943dc26494f8941b	coperfyll@gmail.com	0	david	cordoba	2	7281234	f
27	coperfyll	e5f212f207fdbff90a1164d025c58e45b2e567ad	coperfyll@gmail.com	0	david	coperfyll	2	7281234	f
26	algo@alguien.com	5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8	algo@alguien.com	0	algo	alguien	2	5555555	f
2	\N	d033e22ae348aeb5660fc2140aec35850c4da997	candresramirez@gmail.com	1	Cesar	Ramirez	1	3136611182	f
7	\N	b1b3773a05c0ed0176787a4f1574ff0075f7521e	jose@correo.com	\N	jose	aparicio	2	3124459889	f
3	\N	d033e22ae348aeb5660fc2140aec35850c4da997	andres@correo.com	1	Andres	Ramirez	1	3124435577	f
10	\N	b1b3773a05c0ed0176787a4f1574ff0075f7521e	pedro@correo.com	\N	pedro	perez	2	3152213366	t
9	\N	b1b3773a05c0ed0176787a4f1574ff0075f7521e	pablo@correo.com	\N	pablo 	iglesias	4	314000998	t
11	\N	b1b3773a05c0ed0176787a4f1574ff0075f7521e	david@correo.com	\N	david	cordoba	4	3124456677	t
\.


--
-- Data for Name: users_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users_groups (id, user_id, group_id, erased) FROM stdin;
1	1	1	f
2	1	2	f
3	2	1	f
4	3	2	f
\.


--
-- Name: users_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_groups_id_seq', 4, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 27, true);


--
-- Data for Name: works_us; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY works_us (works_us_id, name, lastname, identity_card, phone, email, userfile, erased) FROM stdin;
1	Cesar	ramirez	1234467766	3112245566	cesar@correo.com	Formularios_people3.pdf	f
2	Jose	Perez	1236123321	312445666788	jose@correo.com	people_aprobado.pdf	f
3	pedro	rodriguez	1231123456	310998776	pedro@correo.com	http---getbootstrap_com-getting-started-download.pdf	f
4	jesus	alca	1324567765	314345667	jesus@correo.com	people_aprobado2.pdf	f
\.


--
-- Name: works_us_works_us_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('works_us_works_us_id_seq', 4, true);


--
-- Name: categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (categories_id);


--
-- Name: groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);


--
-- Name: login_attempts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);


--
-- Name: menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (menu_id);


--
-- Name: messages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (messages_id);


--
-- Name: pk_attachment; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY attachment
    ADD CONSTRAINT pk_attachment PRIMARY KEY (attachment_id);


--
-- Name: pk_client; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY client
    ADD CONSTRAINT pk_client PRIMARY KEY (client_id);


--
-- Name: pk_professional; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY professional
    ADD CONSTRAINT pk_professional PRIMARY KEY (professional_id);


--
-- Name: pk_professional_document; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY document
    ADD CONSTRAINT pk_professional_document PRIMARY KEY (document_id);


--
-- Name: pk_quicker; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY quicker
    ADD CONSTRAINT pk_quicker PRIMARY KEY (quicker_id);


--
-- Name: pk_schema_tables_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY schema_tables
    ADD CONSTRAINT pk_schema_tables_id PRIMARY KEY (schema_tables_id);


--
-- Name: pk_service; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY service
    ADD CONSTRAINT pk_service PRIMARY KEY (service_id);


--
-- Name: pk_template_row; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY template_row
    ADD CONSTRAINT pk_template_row PRIMARY KEY (template_row_id);


--
-- Name: questions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (questions_id);


--
-- Name: structure_table_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY structure_tables
    ADD CONSTRAINT structure_table_pkey PRIMARY KEY (structure_id);


--
-- Name: uc_users_groups; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT uc_users_groups UNIQUE (user_id, group_id);


--
-- Name: users_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT users_groups_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (users_id);


--
-- Name: client_users_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY client
    ADD CONSTRAINT client_users_fk FOREIGN KEY (users_id) REFERENCES users(users_id) ON UPDATE CASCADE;


--
-- Name: fk_attachment_template_row; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY attachment
    ADD CONSTRAINT fk_attachment_template_row FOREIGN KEY (template_row_id) REFERENCES template_row(template_row_id);


--
-- Name: fk_document_professional; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY document
    ADD CONSTRAINT fk_document_professional FOREIGN KEY (professional_id) REFERENCES professional(professional_id);


--
-- Name: fk_service_attachment_attachment; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY service_attachment
    ADD CONSTRAINT fk_service_attachment_attachment FOREIGN KEY (attachment_id) REFERENCES attachment(attachment_id);


--
-- Name: fk_service_document; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY service
    ADD CONSTRAINT fk_service_document FOREIGN KEY (bill_id) REFERENCES document(document_id);


--
-- Name: fk_service_document_report; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY service
    ADD CONSTRAINT fk_service_document_report FOREIGN KEY (report_id) REFERENCES document(document_id);


--
-- Name: fk_service_professional; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY service
    ADD CONSTRAINT fk_service_professional FOREIGN KEY (professional_id) REFERENCES professional(professional_id);


--
-- Name: fk_service_template_row; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY service
    ADD CONSTRAINT fk_service_template_row FOREIGN KEY (template_row_id) REFERENCES template_row(template_row_id);


--
-- Name: messages_users_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY messages
    ADD CONSTRAINT messages_users_fk FOREIGN KEY (users_id) REFERENCES users(users_id) ON DELETE CASCADE;


--
-- Name: professional_users_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY professional
    ADD CONSTRAINT professional_users_fk FOREIGN KEY (users_id) REFERENCES users(users_id) ON UPDATE CASCADE;


--
-- Name: template_row_client_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY template_row
    ADD CONSTRAINT template_row_client_fk FOREIGN KEY (client_id) REFERENCES client(client_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

