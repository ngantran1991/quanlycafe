<?php

namespace SM\Bundle\UserBundle\Constants;

/**
 * Config class
 */
class Configs
{

    const TOKEN_EXPIRED = 7200; // 2 hours
    const RECORD_PER_PAGE = 16; // Set record per page, default is 16
    const DEFAULT_PAGE = 1; // Set default page
    const DEFAULT_GET_ALL_RECORD = 0; // Set default is not get all
    const IS_GET_ALL_RECORD = 1; // Set is get all record
    const DEFAULT_DISTANCE = 3; // Set default distance is 30 km
    // User Status
    const ETAT_COMPTE_DEFAULT = 2; // Set default etat compte is valid
    const ETAT_COMPTE_CREATED = 1; // Set default etat compte is valid
    const ETAT_COMPTE_INACTIVATED = 1; // Account incompleted - actived but not fully profile
    const ETAT_COMPTE_INCOMPLETED = 2; // Account incompleted - actived but not fully profile
    const ETAT_COMPTE_VALIDATED = 3; // Account completed - full info
    const ETAT_COMPTE_DEACTIVATED = 4; // Account deactived - disabled account
    const ETAT_COMPTE_PENDING_DEACTIVATED = 5; // Waiting to deactive
    const ETAT_COMPTE_REMOVE = 5; // Suppend
    const ETAT_COMPTE_DISABLED = 6;
    const ETAT_COMPTE_DISABLED_PRO = 7;
    
    // Language
    const LANGUAGE_DEFAULT = 'fr';
    // Mimetype
    const MIMETYPE_IMAGE = 1;
    const MIMETYPE_PDF = 2;
    // File
    const DEFAULT_STATUS_FILE_ATTACH = 1; // Default is pending
    const PASSPORT_EURO_FILE_TYPE = 4; // Passport euro file type
    const PASSPORT_NON_EURO_FILE_TYPE = 5; // Passport non euro file type
    const RIB_FILE_TYPE = 3; // RIB file type
    const HOMEBILL_FILE_TYPE = 2; // Homebill file type
    const KBIS_FILE_TYPE = 7; // KBIS file type
    const PHOTO_PROFILE_FILE_TYPE = 11; // PHOTO_PROFILE file type
    const COMPANY_STATUS_FILE_TYPE = 17; // COMPANY_STATUS file type
    const DECENNAL_INSURANCE_FILE_TYPE = 16; // DECENNAL_INSURANCE file type
    const CIVIL_INSURANCE_FILE_TYPE = 15; // Homebill file type
    
    
    
    const FILE_TYPE_PERSONAL_ID = 'PERSONAL_ID';
    const FILE_TYPE_REAL_ADDRESS = 'REAL_ADDRESS';
    const FILE_TYPE_RIB_IBAN = 'RIB_IBAN';
    const FILE_TYPE_EU_PASSPORT = 'EU_PASSPORT';
    const FILE_TYPE_NON_EU_PASSPORT = 'NON_EU_PASSPORT';
    const FILE_TYPE_RESIDENCE_PERMIT = 'RESIDENCE_PERMIT';
    const FILE_TYPE_KBIS = 'KBIS';
    const FILE_TYPE_GENERAL_INVOICE = 'GENERAL_INVOICE';
    const FILE_TYPE_GENERAL_QUOTE = 'GENERAL_QUOTE';
    const FILE_TYPE_ADDRESS_BOOK_FILE = 'ADDRESS_BOOK_FILE';
    const FILE_TYPE_PHOTO_PROFILE = 'PHOTO_PROFILE';
    const FILE_TYPE_LOGO_ENTERPRISE = 'LOGO_ENTERPRISE';
    const FILE_TYPE_DOWNLOAD_SPECIFICATION = 'DOWNLOAD_SPECIFICATION';
    const FILE_TYPE_DOWNLOAD_BILL = 'DOWNLOAD_BILL';
    const FILE_TYPE_CIVIL_INSURANCE = 'CIVIL_INSURANCE';
    const FILE_TYPE_DECENNAL_INSURANCE = 'DECENNAL_INSURANCE';
    const FILE_TYPE_COMPANY_STATUS = 'COMPANY_STATUS';
    const FILE_TYPE_OCCUPATION_ICON = 'OCCUPATION_ICON';
    // User type
    const COMPTE_TYPE_CLIENT = 'client'; // Client type
    const COMPTE_TYPE_PRO = 'professional'; // Professional type
    const ADMIN = 'ADMIN';
    const CLIENT_PARTICULAR = 'CLIENT_PARTICULAR';
    const CLIENT_ENTERPRISE = 'CLIENT_ENTERPRISE';
    const PROFESSIONAL_ADMIN = 'PROFESSIONAL_ADMIN';
    const PROFESSIONAL_COLLABORATOR = 'PROFESSIONAL_COLLABORATOR';
    const TARIF_HORRAIRE_DEFAULT = 0;
    const TARIF_DEPLACEMENT_DEFAULT = 0;
    const FACTURABLE_DEFAULT = 0;
    
    
    // Address
    const DEFAULT_ADDRESS_TYPE = 2; // Default is Intervention/Facturation
    const DEFAULT_ADDRESS_STATUS = 1; // Default is Uncontrolled by google
    const ADDRESS_TYPE_BILLING = 1;
    const ADDRESS_TYPE_INTERVENTION = 3;
    const ADDRESS_TYPE_BOTH = 2;
    // Carnet address
    const CARNET_ADDRESS_TYPE_BOTH = 1;
    const CARNET_ADDRESS_TYPE_LOCATAIRE = 2;
    const CARNET_ADDRESS_TYPE_PROPRIETAIRE = 3;
    const CARNET_ADDRESS_ETAT_INACTIVE = 1;
    const CARNET_ADDRESS_ETAT_ACTIVE = 2;
    const CARNET_ADDRESS_ETAT_VALIDATE_GOOGLE = 3;
    const CARNET_ADDRESS_ETAT_INVALIDATE_GOOGLE = 4;
    const CARNET_ADDRESS_ETAT_DEACTIVE = 5;
    const DEFAULT_CARNET_ADDRESS_TYPE = 1; // Locataire/propriétaire
    const DEFAULT_CARNET_ADDRESS_STATUS = 1; // Inactive
    const DEFAULT_CARNET_ADDRESS_SEARCH_TYPE = 1; // Search by address name
    const CARNET_ADDRESS_SEARCH_BY_CITY = 2; // Search by city
    const CARNET_ADDRESS_SEARCH_KEYWORD = 'A'; // Default search keyword is character A
    const CARNET_ADDRESS_TYPE_BUILDING_DEFAULT = 1;
    
    // Action when add new address book in front-end
    const CARNET_ADDRESS_ACTION_YES = 1;
    const CARNET_ADDRESS_ACTION_CHECK = 2;
    const CARNET_ADDRESS_ACTION_NO = 3;

    // Category niveau level
    const CATEGORY_NIVEAU_LEVEL_1 = 1;
    const CATEGORY_NIVEAU_LEVEL_2 = 2;
    const CATEGORY_NIVEAU_LEVEL_3 = 3;
    const CATEGORY_NIVEAU_LEVEL_4 = 4;
    // Etat Wallet
    const DEFAULT_ETAT_WALLET = 5;
    
    // Intervention
    const DEFAULT_CATEGORY_NIVEAU_2 = 1;
    const DEFAULT_CATEGORY_NIVEAU_3 = 1;
    const DEFAULT_CATEGORY_NIVEAU_4 = 1;
    const DEFAULT_CATEGORY_NIVEAU_5 = 1;
    const DEFAULT_STATUS_INTERVENTION = 1; // Default status is Nouveauté (New)
    const DEFAULT_ETAT_INTERVENTION = 2; // Default status is Désactivée (Deactive)

    const ETAT_INTERVENTION_ACTIVATE = 'ETAT_INTERVENTION_ACTIVATE';
    const ETAT_INTERVENTION_DEACTIVATE = 'ETAT_INTERVENTION_DEACTIVATE';
    const ETAT_INTERVENTION_NOT_VISIBLE = 'ETAT_INTERVENTION_NOT_VISIBLE';
    const ETAT_INTERVENTION_PART_VISIBLE = 'ETAT_INTERVENTION_PART_VISIBLE';
    const ETAT_INTERVENTION_VALIDATE = 'ETAT_INTERVENTION_VALIDATE';
    const ETAT_INTERVENTION_NOT_VALIDATE = 'ETAT_INTERVENTION_NOT_VALIDATE';
    
    const STATUS_INTERVENTION_ACCEPTED = 3;
    const STATUS_INTERVENTION_CLOSED = 6;
    
    const ETAT_STRING = 'etat';
    const TYPE_COMPTE_CLIENT_INTERGER = 2;
    const TYPE_COMPTE_PRO_INTERGER = 3;
    const TYPE_COMPTE_COLL_INTERGER = 4;
    
    
    public static function getListLanguage()
    {
        return array('fr', 'en');

    }
}
