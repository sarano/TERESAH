<?php

return array(
    "admin" => array(
        "activities" => array(
            "index" => array(
                "heading" => "Actividad reciente",
                "listing_results" => "Listado de actividad reciente de <span class=\"label round\">:de</span> a <span class=\"label round\">:a</span> de <span class=\"label round\">:total</span> disponibles."
            ),

            "activity" => array(
                "from_ip_address" => "desde la dirección IP",
                "on" => "conectado"
            ),

            "apikey" => array(
                "created" => "API Key creada",
                "created_but_since_deleted" => "added an API Key which has since been deleted",
                "updated" => "API Key actualizada",
                "updated_but_since_deleted" => "updated API Key which has since been deleted",
                "deleted" => "API Key borrada",
                "deleted_but_since_restored" => "deleted API Key (since been restored)",
                "restored" => "API Key restaurada",
                "restored_but_since_deleted" => "restored API Key which has since been deleted again"
            ),

            "data" => array(
                "created" => "added a data entry :target_name",
                "created_but_since_deleted" => "added a data entry :target_name which has since been deleted",
                "updated" => "updated data entry :target_name",
                "updated_and_name_changed" => "updated data entry :target_previous_name and renamed data entry to :target_name",
                "updated_but_since_deleted" => "updated data entry :target_name which has since been deleted",
                "deleted" => "deleted data entry :target_name",
                "deleted_but_since_restored" => "deleted data entry :target_name (since been restored)",
                "restored" => "restored data entry :target_name",
                "restored_but_since_deleted" => "restored data entry :target_name which has since been deleted again"
            ),

            "datasource" => array(
                "created" => "added a data source <a href=\":target_link\" title=\"Show Data Source\">:target_name</a>",
                "created_but_since_deleted" => "added a data source :target_name which has since been deleted",
                "updated" => "updated data source <a href=\":target_link\" title=\"Show Data Source\">:target_name</a>",
                "updated_and_name_changed" => "updated data source <a href=\":target_link\" title=\"Show Data Source\">:target_previous_name</a> and renamed data source to <a href=\":target_link\" title=\"Show Data Source\">:target_name</a>",
                "updated_but_since_deleted" => "updated data source :target_name which has since been deleted",
                "deleted" => "deleted data source :target_name",
                "deleted_but_since_restored" => "deleted data source <a href=\":target_link\" title=\"Show Data Source\">:target_name</a> (since been restored)",
                "restored" => "restored data source <a href=\":target_link\" title=\"Show Data Source\">:target_name</a>",
                "restored_but_since_deleted" => "restored data source :target_name which has since been deleted again"
            ),

            "datatype" => array(
                "created" => "data type creado <a href=\":target_link\" title=\"Show Data Type\">:target_name</a>",
                "created_but_since_deleted" => "added a data type :target_name which has since been deleted",
                "updated" => "data type actualizado <a href=\":target_link\" title=\"Show Data Type\">:target_name</a>",
                "updated_and_name_changed" => "updated data type <a href=\":target_link\" title=\"Show Data Type\">:target_previous_name</a> and renamed data type to <a href=\":target_link\" title=\"Show Data Type\">:target_name</a>",
                "updated_but_since_deleted" => "updated data type :target_name which has since been deleted",
                "deleted" => "data type borrado :target_name",
                "deleted_but_since_restored" => "deleted data type <a href=\":target_link\" title=\"Show Data Type\">:target_name</a> (since been restored)",
                "restored" => "data type restaurado <a href=\":target_link\" title=\"Show Data Type\">:target_name</a>",
                "restored_but_since_deleted" => "restored data type :target_name which has since been deleted again"
            ),

            "signup" => array(
                "created" => "registrado como usuario"
            ),

            "tool" => array(
                "created" => "herramienta creada <a href=\":target_link\" title=\"Show Tool\">:target_name</a>",
                "created_but_since_deleted" => "added a tool :target_name which has since been deleted",
                "updated" => "herramienta actualizada <a href=\":target_link\" title=\"Show Tool\">:target_name</a>",
                "updated_and_name_changed" => "updated tool <a href=\":target_link\" title=\"Show Tool\">:target_previous_name</a> and renamed tool to <a href=\":target_link\" title=\"Show Tool\">:target_name</a>",
                "updated_but_since_deleted" => "updated tool :target_name which has since been deleted",
                "deleted" => "herramienta borrada :target_name",
                "deleted_but_since_restored" => "deleted tool <a href=\":target_link\" title=\"Show Tool\">:target_name</a> (since been restored)",
                "restored" => "herramienta restaurada <a href=\":target_link\" title=\"Show Tool\">:target_name</a>",
                "restored_but_since_deleted" => "restored tool :target_name which has since been deleted again"
            ),

            "user" => array(
                "created" => "cuenta de usuario creada para <a href=\":target_link\" title=\"Show User Account\">:target_name</a>",
                "created_but_since_deleted" => "cuenta de usuario creada para :target_name desde que ha sido borrada",
                "updated" => "cuenta de usuario actualizada para <a href=\":target_link\" title=\"Show User Account\"></a>",
                "updated_and_name_changed" => "cuenta de usuario actualizada, cambio de nombre de cuenta :target_previous_name a <a href=\":target_link\" title=\"Show User Account\">:target_name</a>",
                "updated_for_user" => "cuenta de usuario actualizada para <a href=\":target_link\" title=\"Show User Account\">:target_name</a>",
                "updated_for_user_and_name_changed" => "cuenta de usuario actualizada para <a href=\":target_link\" title=\"Show User Account\">:target_previous_name</a>, cambio de nombre de cuenta por <a href=\":target_link\" title=\"Show User Account\">:target_name</a>",
                "updated_but_since_deleted" => "cuenta de usuario actualizada para :target_name desde que ha sido borrada",
                "deleted" => "cuenta de usuario borrada :target_name",
                "deleted_but_since_restored" => "cuenta de usuario borrada <a href=\":target_link\" title=\"Show User Account\">:target_name</a> (desde que ha sido restaurada)",
                "restored" => "cuenta de usuario restaurada <a href=\":target_link\" title=\"Show User Account\">:target_name</a>",
                "restored_but_since_deleted" => "cuenta de usuario restaurada :target_name which desde que ha sido borrada otra vez"
            )
        ),

        "api_keys" => array(
            "index" => array(
                "heading" => "API Keys",
                "listing_results" => "Listado de API Keys de <span class=\"label round\">:de</span> a <span class=\"label round\">:a</span> de <span class=\"label round\">:total</span> disponibles.",
                "actions" => array(
                    "name" => "Acciones",
                    "show" => array(
                        "name" => "Muestra",
                        "title" => "Muestra API Key"
                    ),
                    "edit" => array(
                        "name" => "Edita",
                        "title" => "Edita API Key"
                    ),
                    "delete" => array(
                        "name" => "Borra",
                        "title" => "Borra API Key",
                        "confirm" => "¿Está seguro que quiere borrar la API Key \":token\" for the user \":user\" y revocar el acceso a la API?"
                    )
                )
            ),

            "form" => array(
                "enabled" => array(
                    "label" => "Acceso API",
                    "name" => "Activada"
                ),
                "select_user" => array(
                    "label" => "Seleccione cuenta de usuario",
                    "placeholder" => "Seleccione cuenta de usuario"
                ),
                "token" => array(
                    "label" => "API Access Token",
                    "placeholder" => "API Access Token"
                )
            ),

            "create" => array(
                "form" => array(
                    "submit" => "Añada API Key"
                ),
                "heading" => "Añada API Key"
            ),

            "edit" => array(
                "form" => array(
                    "submit" => "Actualizar API Key"
                ),
                "heading" => "Editar API Key"
            )
        ),

        "data_sources" => array(
            "index" => array(
                "heading" => "Data Sources",
                "listing_results" => "Listing Data Sources from <span class=\"label round\">:from</span> to <span class=\"label round\">:to</span> of <span class=\"label round\">:total</span> available.",
                "actions" => array(
                    "name" => "Actions",
                    "show" => array(
                        "name" => "Show",
                        "title" => "Show Data Source"
                    ),
                    "edit" => array(
                        "name" => "Edit",
                        "title" => "Edit Data Source"
                    ),
                    "delete" => array(
                        "name" => "Delete",
                        "title" => "Delete Data Source",
                        "confirm" => "Are you sure you want to delete the Data Source \":name\"?"
                    )
                )
            ),

            "form" => array(
                "name" => array(
                    "label" => "Name",
                    "placeholder" => "Name"
                ),
                "description" => array(
                    "label" => "Description",
                    "placeholder" => "Description"
                ),
                "homepage" => array(
                    "label" => "Homepage",
                    "placeholder" => "Homepage"
                )
            ),

            "create" => array(
                "form" => array(
                    "submit" => "Add Data Source"
                ),
                "heading" => "Add a Data Source"
            ),

            "edit" => array(
                "form" => array(
                    "submit" => "Update Data Source"
                ),
                "heading" => "Edit Data Source"
            )
        ),

        "data_types" => array(
            "index" => array(
                "heading" => "Data Types",
                "listing_results" => "Listing Data Types from <span class=\"label round\">:from</span> to <span class=\"label round\">:to</span> of <span class=\"label round\">:total</span> available.",
                "actions" => array(
                    "name" => "Actions",
                    "show" => array(
                        "name" => "Show",
                        "title" => "Show Data Type"
                    ),
                    "edit" => array(
                        "name" => "Edit",
                        "title" => "Edit Data Type"
                    ),
                    "delete" => array(
                        "name" => "Delete",
                        "title" => "Delete Data Type",
                        "confirm" => "Are you sure you want to delete the Data Type \":label\"?"
                    )
                )
            ),

            "form" => array(
                "label" => array(
                    "label" => "Label",
                    "placeholder" => "Label"
                ),
                "description" => array(
                    "label" => "Description",
                    "placeholder" => "Description"
                ),
                "rdf_mapping" => array(
                    "label" => "RDF mapping",
                    "placeholder" => "RDF mapping"
                ),
                "linkable" => array(
                    "label" => "Linkable",
                    "placeholder" => ""
                )
            ),

            "create" => array(
                "form" => array(
                    "submit" => "Add Data Type"
                ),
                "heading" => "Add a Data Type"
            ),

            "edit" => array(
                "form" => array(
                    "submit" => "Update Data Type"
                ),
                "heading" => "Edit Data Type"
            )
        ),

        "tools" => array(
            "navigation" => array(
                "tool" => array(
                    "name" => "Tool",
                    "title" => "Show Tool"
                ),
                "data_sources" => array(
                    "name" => "Data Sources",
                    "title" => "Show Data Sources"
                )
            ),

            "index" => array(
                "heading" => "Tools",
                "listing_results" => "Listing Tools from <span class=\"label round\">:from</span> to <span class=\"label round\">:to</span> of <span class=\"label round\">:total</span> available.",
                "actions" => array(
                    "name" => "Actions",
                    "show" => array(
                        "name" => "Show",
                        "title" => "Show Tool"
                    ),
                    "edit" => array(
                        "name" => "Edit",
                        "title" => "Edit Tool"
                    ),
                    "delete" => array(
                        "name" => "Delete",
                        "title" => "Delete Tool",
                        "confirm" => "Are you sure you want to delete the Tool \":name\"?"
                    )
                )
            ),

            "form" => array(
                "name" => array(
                    "label" => "Name",
                    "placeholder" => "Name"
                )
            ),

            "create" => array(
                "form" => array(
                    "submit" => "Add Tool"
                ),
                "heading" => "Add a Tool"
            ),

            "edit" => array(
                "form" => array(
                    "submit" => "Update Tool"
                ),
                "heading" => "Edit Tool"
            ),

            "data_sources" => array(
                "navigation" => array(
                    "index" => array(
                        "name" => "List Data Sources",
                        "title" => "List Data Sources"
                    ),
                    "show" => array(
                        "name" => "Show Tool Data",
                        "title" => "Show Tool Data"
                    ),
                    "create" => array(
                        "name" => "Add Data Source",
                        "title" => "Add Data Source"
                    ),
                    "destroy" => array(
                        "name" => "Remove Data Source",
                        "title" => "Remove Data Source",
                        "confirm" => "Are you sure you want to detach the Data Source \":name\" from Tool?"
                    ),
                    "data" => array(
                        "create" => array(
                            "name" => "Add Tool Data",
                            "title" => "Add Tool Data"
                        )
                    )
                ),

                "form" => array(
                    "select_data_source" => array(
                        "label" => "Select Data Source",
                        "placeholder" => "Select Data Source"
                    )
                ),

                "create" => array(
                    "form" => array(
                        "submit" => "Attach Data Source"
                    ),
                    "heading" => "Attach a Data Source"
                ),

                "show" => array(
                    "heading" => array(
                        "available_data" => "Available Data"
                    ),
                    "actions" => array(
                        "name" => "Actions",
                        "edit" => array(
                            "name" => "Edit",
                            "title" => "Edit Data"
                        ),
                        "delete" => array(
                            "name" => "Delete",
                            "title" => "Delete Data",
                            "confirm" => "Are you sure you want to delete the Data Type entry \":label\"?"
                        )
                    ),
                    "messages" => array(
                        "no_data" => "No Data available on Data Source.",
                        "no_data_sources" => "No Data Sources attached to Tool."
                    )
                ),

                "data" => array(
                    "form" => array(
                        "data_type" => array(
                            "label" => "Data Type",
                            "placeholder" => "Data Type"
                        ),
                        "value" => array(
                            "label" => "Value",
                            "placeholder" => "Value"
                        )
                    ),

                    "create" => array(
                        "form" => array(
                            "submit" => "Add Data"
                        ),
                        "heading" => "Add Data to Data Source"
                    ),

                    "edit" => array(
                        "form" => array(
                            "submit" => "Update Data"
                        ),
                        "heading" => "Edit Data under the Data Source"
                    )
                )
            )
        ),

        "users" => array(
            "index" => array(
                "heading" => "Users",
                "listing_results" => "Listing users from <span class=\"label round\">:from</span> to <span class=\"label round\">:to</span> of <span class=\"label round\">:total</span> available.",
                "actions" => array(
                    "name" => "Actions",
                    "show" => array(
                        "name" => "Show",
                        "title" => "Show User"
                    ),
                    "edit" => array(
                        "name" => "Edit",
                        "title" => "Edit User"
                    ),
                    "delete" => array(
                        "name" => "Delete",
                        "title" => "Delete User",
                        "confirm" => "Are you sure you want to delete the User Account \":name\"?"
                    )
                )
            ),

            "form" => array(
                "name" => array(
                    "label" => "Name",
                    "placeholder" => "Name"
                ),
                "locale" => array(
                    "label" => "Locale",
                    "placeholder" => "Select locale..."
                ),
                "email_address" => array(
                    "label" => "Email address",
                    "placeholder" => "Email address"
                ),
                "password" => array(
                    "label" => "Password",
                    "placeholder" => "Password"
                ),
                "password_confirmation" => array(
                    "label" => "Password confirmation",
                    "placeholder" => "Repeat password"
                ),
                "active" => array(
                    "label" => "User Account State",
                    "name" => "Active"
                ),
                "user_level" => array(
                    "label" => "User Account Level",
                    "select_user_level" => "Select a user level"
                )
            ),

            "create" => array(
                "form" => array(
                    "submit" => "Create User Account"
                ),
                "heading" => "Create a User Account"
            ),

            "edit" => array(
                "form" => array(
                    "submit" => "Update User Account"
                ),
                "heading" => "Edit User Account"
            )
        )
    ),

    "password_reset" => array(
        "request" => array(
            "form" => array(
                "submit" => "Reset my password"
            ),
            "heading" => "Forgot your password?",
            "email_sent" => "Email with password reset information sent to ",
            "invalid_token" => "Invalid password reset link. Please try again. If the error persists, please contact an administrator."
        ),

        "reset" => array(
            "form" => array(
                "submit" => "Update password"
            ),
            "heading" => "Update your password",
            "invalid_token" => "Invalid password reset link. Please try again. If the error persists, please contact an administrator.",
            "password_updated" => "New password set"
        )
    ),

    "sessions" => array(
        "form" => array(
            "email_address" => array(
                "label" => "Email address",
                "placeholder" => "Email address"
            ),
            "password" => array(
                "label" => "Password",
                "placeholder" => "Password"
            ),
            "submit" => "Sign in",
            "forgot_password" => array(
                "name" => "Forgot password",
                "title" => "Forgot password"
            ),
            "sign_up" => array(
                "not_a_user" => "Not a user?",
                "name" => "Sign up",
                "title" => "Sign up"
            ),
            "sign_in" => array(
                "facebook" => "Sign in via Facebook",
                "googleplus" => "Sign in via Google Plus",
                "linkedin" => "Sign in via Linked In"
            )
        ),

        "create" => array(
            "heading" => "Sign in"
        )
    ),

    "signup" => array(
        "form" => array(
            "name" => array(
                "label" => "Name",
                "placeholder" => "Name"
            ),
            "locale" => array(
                "label" => "Locale",
                "placeholder" => "Select locale..."
            ),
            "email_address" => array(
                "label" => "Email address",
                "placeholder" => "Email address"
            ),
            "password" => array(
                "label" => "Password",
                "placeholder" => "Password"
            ),
            "password_confirmation" => array(
                "label" => "Password confirmation",
                "placeholder" => "Repeat password"
            )
        ),

        "create" => array(
            "form" => array(
                "submit" => "Sign up"
            ),
            "heading" => "Sign up"
        )
    ),

    "shared" => array(
        "form" => array(
            "error" => array(
                "message" => "We are terribly sorry, but following errors prohibited us to process the form. Please, review the form."
            ),
            "email_missing" => "Email address is mandatory",
            "cancel" => "cancel",
            "or" => "or",
            "select_locale" => "Select a locale"
        ),

        "locales" => array(
            "en" => "English",
            "es" => "Español",
            "sv" => "Svenska"
        ),

        "messages" => array(
            "admin" => array(
                "warning" => array(
                    "highlight" => "Please, be careful!",
                    "message" => "You are currently in an administrative section of TERESAH."
                )
            ),
            "close" => "Close",
            "current_version" => array(
                "commit_id" => array(
                    "error" => "Error: Unable to retrieve the current commit ID.",
                    "message" => "version (current commit ID):"
                ),
                "commit_date" => array(
                    "error" => "Error: Unable to retrieve the current commit date."
                )
            )
        ),

        "meta" => array(
            "author" => "DASISH",
            "description" => "TERESAH (Tools E-Registry for E-Social science, Arts and Humanities) is a cross-community tools knowledge registry aimed at researchers in the Social Sciences and Humanities (SSH). It aims to provide an authoritative listing of the software tools currently in use in those domains, and to allow their users to make transparent the methods and applications behind them.",
            "keywords" => "aplicaciones informáticas, conocimiento, librerías, metodología, métodos, registro, investigadores, servicios, programas, normas, herramientas, CESSDA, CLARIN, DARIAH, ESFRI, ESS, SHARE, TERESAH",
            "title" => "TERESAH",
        ),

        "navigation" => array(
            "teresah" => array(
                "name" => "TERESAH",
                "title" => "Página inicial"
            ),
            
            "admin" => array(
                "home" => array(
                    "name" => "Administrar página inicial",
                    "title" => "Administrar página inicial"
                ),

                "dashboard" => array(
                    "name" => "Tablero de mandos",
                    "title" => "Tablero de mandos"
                ),

                "activities" => array(
                    "name" => "Actividades",
                    "title" => "Actividades"
                ),

                "api" => array(
                    "name" => "API",
                    "title" => "API",
                    "create" => array(
                        "name" => "Añadir API Key",
                        "title" => "Añadir API Key"
                    ),
                    "index" => array(
                        "name" => "Administrar API Keys",
                        "title" => "Administrar API Keys"
                    )
                ),

                "data_sources" => array(
                    "name" => "Data Sources",
                    "title" => "Data Sources",
                    "show" => array(
                        "name" => "Ver Data Source",
                        "title" => "Ver Data Source"
                    ),
                    "create" => array(
                        "name" => "Añadir Data Source",
                        "title" => "Añadir Data Source"
                    ),
                    "edit" => array(
                        "name" => "Editar Data Source",
                        "title" => "Editar Data Source"
                    ),
                    "index" => array(
                        "name" => "Administrar Data Sources",
                        "title" => "Administrar Data Sources"
                    )
                ),

                "data_types" => array(
                    "name" => "Data Types",
                    "title" => "Data Types",
                    "show" => array(
                        "name" => "Ver Data Type",
                        "title" => "Ver Data Type"
                    ),
                    "create" => array(
                        "name" => "Añadir Data Type",
                        "title" => "Añadir Data Type"
                    ),
                    "edit" => array(
                        "name" => "Editar Data Type",
                        "title" => "Editar Data Type"
                    ),
                    "index" => array(
                        "name" => "Administrar Data Types",
                        "title" => "Administrar Data Types"
                    )
                ),

                "tools" => array(
                    "name" => "Herramientas",
                    "title" => "Herramientas",
                    "show" => array(
                        "name" => "Ver herramienta",
                        "title" => "Ver herramienta"
                    ),
                    "create" => array(
                        "name" => "Agregar herramienta",
                        "title" => "Agregar herramienta"
                    ),
                    "edit" => array(
                        "name" => "Editar herramienta",
                        "title" => "Editar herramienta"
                    ),
                    "index" => array(
                        "name" => "Administrar herramientas",
                        "title" => "Administrar herramientas"
                    )
                ),

                "users" => array(
                    "name" => "Usuarios",
                    "title" => "Usuarios",
                    "show" => array(
                        "name" => "Ver cuenta de usuario",
                        "title" => "Ver cuenta de usuario"
                    ),
                    "create" => array(
                        "name" => "Crear nueva cuenta de usuario",
                        "title" => "Crear nueva cuenta de usuario"
                    ),
                    "edit" => array(
                        "name" => "Editar cuentas de usuario",
                        "title" => "Editar cuentas de usuario"
                    ),
                    "index" => array(
                        "name" => "Administrar cuentas de usuario",
                        "title" => "Administrar cuentas de usuario"
                    )
                ),

                "switch" => array(
                    "name" => "Explorar TERESAH",
                    "title" => "Acceder a explorar TERESAH"
                )
            ),

            "dasish" => array(
                "name" => "DASISH",
                "title" => "DASISH",
                "href" => "http://dasish.eu/"
            ),

            "home" => array(
                "name" => "Home",
                "title" => "Home"
            ),

            "browse" => array(
                "name" => "Explorar herramientas por",
                "title" => "Explorar herramientas por",
                "all" => array(
                    "name" => "Explorar todo",
                    "title" => "Explorar todo"
                ),
                "facets" => array(
                    "name" => "Explorar facetas",
                    "title" => "Explorar facetas"
                ),
                "by_alphabet" => array(
                    "name" => "En orden alfabético"
                ),
                "by_facet" => array(
                    "name" => "Por facetas"
                ),
                "popular" => array(
                    "name" => "Herramientas más populares",
                    "title" => "Más populares"
                ),
                "search" => array(
                    "name" => "Buscar",
                    "title" => "Buscar"
                )
            ),

            "search" => array(
                "name" => "Búsqueda",
                "title" => "Búsqueda",
                "placeholder" => "Búsqueda...",
                "faceted" => array(
                    "name" => "Facetas",
                    "title" => "Facetas"
                ),
                "general" => array(
                    "name" => "General",
                    "title" => "General"
                )
            ),

            "about" => array(
                "name" => "Sobre",
                "title" => "Sobre",
                "teresah" => array(
                    "name" => "TERESAH",
                    "title" => "Sobre TERESAH"
                ),
                "api" => array(
                    "name" => "API",
                    "title" => "API"
                ),
                "rdf" => array(
                    "name" => "RDF",
                    "title" => "RDF"
                ),
                "privacy_policy" => array(
                    "name" => "Política de privacidad",
                    "title" => "Política de privacidad"
                ),
                "license" => array(
                    "name" => "Licencia y citación",
                    "title" => "Licencia y citación"
                )
            ),

            "fork" => array(
                "name" => "TERESAH en GitHub"
            ),

            "contribute" => array(
                "name" => "Contribuir",
                "title" => "Contribuir"
            ),

            "edit_user_profile" => array(
                "name" => "Editar perfil",
                "title" => "Editar perfil"
            ),

            "edit_user_api_keys" => array(
                "name" => "Administrar API Keys",
                "title" => "Administrar API Keys"
            ),

            "edit_user_tools" => array(
                "name" => "Mis herramientas",
                "title" => "Mis herramientas"
            ),

            "switch" => array(
                "name" => "Administrar TERESAH",
                "title" => "Acceder a panel de control de TERESAH"
            ),

            "login" => array(
                "name" => "Registrarse",
                "title" => "Iniciar sesión",
                "login_via" => "Iniciar sesión via"
            ),

            "logout" => array(
                "name" => "Cerrar sesión",
                "title" => "Cerrar sesión"
            )
        )
    ),

    "tools" => array(
        "index" => array(
            "heading" => "Herramientas",
            "listing_results" => "Listar herramientas de <span class=\"badge\">:de</span> a <span class=\"badge\">:to</span> de <span class=\"badge\">:total</span> disponibles.",
            "accending" => "ascendente",
            "descending" => "descendente",
            "not_found" => "No se encontraron herramientas"
        ),

        "by_facet" => array(
            "index" => array(
                "heading" => "Por facetas",
                "listing_results" => "Listar facetas de <span class=\"badge\">:de</span> a <span class=\"badge\">:to</span> de <span class=\"badge\">:total</span> disponibles."
            )
        ),

        "data_sources" => array(
            "show" => array(
                "heading" => array(
                    "available_data" => "Datos disponibles"
                ),
                "on" => "on",
                "messages" => array(
                    "no_data" => "No hay datos disponibles en Data Source.",
                    "no_data_sources" => "No hay Data Sources adjuntos a la herramienta."
                ),
                "use" => array(
                    "title" => "Añadir a 'Mis herramientas'"
                ),
                "unuse" => array(
                    "title" => "Eliminar de 'Mis herramientas'"
                ),
                "similar_tools" => "Herramientas similares",
                "share" => "Compartir",
                "export" => "Exportar",
                "available_data_formats" => "Available Data Formats"
            )
        ),

        "popular" => array(
            "heading" => "Herramientas más populares",
        ),

        "search" => array(
            "form" => array(
                "search" => array(
                    "label" => "Buscar",
                    "placeholder" => "Encontrar herramientas, servicios, metodologías y más ..."
                )
            ),

            "index" => array(
                "heading" => "Herramientas de búsqueda",
                "list_more" => "Lista :num more",
            )
        )
    ),

    "users" => array(
        "api_key" => array(
            "heading" => "API keys",
            "api-key" => "Key",
            "created_at" => "Creado el",
            "description" => "Descripción",
            "description-empty" => "Haga clic para añadir una descripción",
            "actions" => array(
                "name" => "Acciones",
                "remove" => array(
                    "title" => "Eliminar API key",
                    "confirm" => "¿Está seguro que quiere eliminar la API key?"
                )
            ),
            "apply" => "Solicitar API key"
        ),

        "form" => array(
            "heading" => "Detalles del perfil",
            "name" => array(
                "label" => "Nombre",
                "placeholder" => "Nombre"
            ),
            "locale" => array(
                "label" => "Lugar"
            ),
            "email_address" => array(
                "label" => "Dirección de correo electrónico",
                "placeholder" => "Dirección de correo electrónico"
            ),
            "password" => array(
                "label" => "Nueva contraseña",
                "placeholder" => "Nueva contraseña"
            ),
            "password_confirmation" => array(
                "label" => "Confirmación de nueva contraseña",
                "placeholder" => "Repetir nueva contraseña"
            )
        ),

        "edit" => array(
            "form" => array(
                "submit" => "Actualizar perfil"
            ),
            "heading" => "Editar perfil"
        ),

        "tools" => array(
            "heading" => "Mis herramientas",
            "name" => "Mis herramientas",
            "empty" => "No se ha añadido ninguna herramienta a la lista",
            "actions" => array(
                "name" => "Acciones",
                "remove" => array(
                    "title" => "Eliminar de la lista",
                    "confirm" => "¿Está seguro que quiere eliminar la herramienta de la lista?"
                )
            )
        )
    )
);
