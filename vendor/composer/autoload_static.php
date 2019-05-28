<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite4bf1495e28a969bde9be17284ccdb4d
{
    public static $files = array (
        '242e3a0f363e5698681bbb20327c9441' => __DIR__ . '/..' . '/colbycomms/colby-svg/wp/index.php',
        'a61bd579f03f8e0773256ddbc044d4b3' => __DIR__ . '/..' . '/colbycomms/heroic-panel/heroic-panel/index.php',
        '6db8f39525cd1d59e44f42c765ba4b49' => __DIR__ . '/../..' . '/wp-content/plugins/whos-coming/whos-coming/index.php',
        'd295ace785b0728c48ea4a22e2194784' => __DIR__ . '/..' . '/colbycomms/wp-collapsible/wp/index.php',
        '85b4c5f2f9e7b594fdf26b3748b01ba9' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/index.php',
        'c593e89827171e1f7b0b844f4f0139b4' => __DIR__ . '/../..' . '/wp-autoload/index.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
            'ColbyComms\\WhosComing\\' => 22,
            'ColbyComms\\TwentyEighteen\\' => 26,
            'ColbyComms\\Schedules\\' => 21,
            'ColbyComms\\SVG\\' => 15,
            'ColbyComms\\HeroicPanel\\' => 23,
            'ColbyComms\\Collapsible\\' => 23,
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'ColbyComms\\WhosComing\\' => 
        array (
            0 => __DIR__ . '/../..' . '/wp-content/plugins/whos-coming/whos-coming',
        ),
        'ColbyComms\\TwentyEighteen\\' => 
        array (
            0 => __DIR__ . '/../..' . '/wp-autoload/classes',
        ),
        'ColbyComms\\Schedules\\' => 
        array (
            0 => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule',
        ),
        'ColbyComms\\SVG\\' => 
        array (
            0 => __DIR__ . '/..' . '/colbycomms/colby-svg/wp/classes',
        ),
        'ColbyComms\\HeroicPanel\\' => 
        array (
            0 => __DIR__ . '/..' . '/colbycomms/heroic-panel/heroic-panel',
        ),
        'ColbyComms\\Collapsible\\' => 
        array (
            0 => __DIR__ . '/..' . '/colbycomms/wp-collapsible/wp',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Carbon_Fields\\Block' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Block.php',
        'Carbon_Fields\\Carbon_Fields' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Carbon_Fields.php',
        'Carbon_Fields\\Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container.php',
        'Carbon_Fields\\Container\\Block_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Block_Container.php',
        'Carbon_Fields\\Container\\Broken_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Broken_Container.php',
        'Carbon_Fields\\Container\\Comment_Meta_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Comment_Meta_Container.php',
        'Carbon_Fields\\Container\\Condition\\Blog_ID_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Blog_ID_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Boolean_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Boolean_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Comparer\\Any_Contain_Comparer' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Comparer/Any_Contain_Comparer.php',
        'Carbon_Fields\\Container\\Condition\\Comparer\\Any_Equality_Comparer' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Comparer/Any_Equality_Comparer.php',
        'Carbon_Fields\\Container\\Condition\\Comparer\\Comparer' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Comparer/Comparer.php',
        'Carbon_Fields\\Container\\Condition\\Comparer\\Contain_Comparer' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Comparer/Contain_Comparer.php',
        'Carbon_Fields\\Container\\Condition\\Comparer\\Custom_Comparer' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Comparer/Custom_Comparer.php',
        'Carbon_Fields\\Container\\Condition\\Comparer\\Equality_Comparer' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Comparer/Equality_Comparer.php',
        'Carbon_Fields\\Container\\Condition\\Comparer\\Scalar_Comparer' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Comparer/Scalar_Comparer.php',
        'Carbon_Fields\\Container\\Condition\\Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Condition.php',
        'Carbon_Fields\\Container\\Condition\\Current_User_Capability_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Current_User_Capability_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Current_User_ID_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Current_User_ID_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Current_User_Role_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Current_User_Role_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Factory' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Factory.php',
        'Carbon_Fields\\Container\\Condition\\Post_Ancestor_ID_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_Ancestor_ID_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Post_Format_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_Format_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Post_ID_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_ID_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Post_Level_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_Level_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Post_Parent_ID_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_Parent_ID_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Post_Template_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_Template_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Post_Term_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_Term_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Post_Type_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Post_Type_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Term_Ancestor_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Term_Ancestor_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Term_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Term_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Term_Level_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Term_Level_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Term_Parent_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Term_Parent_Condition.php',
        'Carbon_Fields\\Container\\Condition\\Term_Taxonomy_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/Term_Taxonomy_Condition.php',
        'Carbon_Fields\\Container\\Condition\\User_Capability_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/User_Capability_Condition.php',
        'Carbon_Fields\\Container\\Condition\\User_ID_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/User_ID_Condition.php',
        'Carbon_Fields\\Container\\Condition\\User_Role_Condition' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Condition/User_Role_Condition.php',
        'Carbon_Fields\\Container\\Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Container.php',
        'Carbon_Fields\\Container\\Fulfillable\\Fulfillable' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Fulfillable/Fulfillable.php',
        'Carbon_Fields\\Container\\Fulfillable\\Fulfillable_Collection' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Fulfillable/Fulfillable_Collection.php',
        'Carbon_Fields\\Container\\Fulfillable\\Translator\\Array_Translator' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Fulfillable/Translator/Array_Translator.php',
        'Carbon_Fields\\Container\\Fulfillable\\Translator\\Json_Translator' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Fulfillable/Translator/Json_Translator.php',
        'Carbon_Fields\\Container\\Fulfillable\\Translator\\Translator' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Fulfillable/Translator/Translator.php',
        'Carbon_Fields\\Container\\Nav_Menu_Item_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Nav_Menu_Item_Container.php',
        'Carbon_Fields\\Container\\Network_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Network_Container.php',
        'Carbon_Fields\\Container\\Post_Meta_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Post_Meta_Container.php',
        'Carbon_Fields\\Container\\Repository' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Repository.php',
        'Carbon_Fields\\Container\\Term_Meta_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Term_Meta_Container.php',
        'Carbon_Fields\\Container\\Theme_Options_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Theme_Options_Container.php',
        'Carbon_Fields\\Container\\User_Meta_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/User_Meta_Container.php',
        'Carbon_Fields\\Container\\Widget_Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Container/Widget_Container.php',
        'Carbon_Fields\\Datastore\\Comment_Meta_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Comment_Meta_Datastore.php',
        'Carbon_Fields\\Datastore\\Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Datastore.php',
        'Carbon_Fields\\Datastore\\Datastore_Holder_Interface' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Datastore_Holder_Interface.php',
        'Carbon_Fields\\Datastore\\Datastore_Interface' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Datastore_Interface.php',
        'Carbon_Fields\\Datastore\\Empty_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Empty_Datastore.php',
        'Carbon_Fields\\Datastore\\Key_Value_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Key_Value_Datastore.php',
        'Carbon_Fields\\Datastore\\Meta_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Meta_Datastore.php',
        'Carbon_Fields\\Datastore\\Nav_Menu_Item_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Nav_Menu_Item_Datastore.php',
        'Carbon_Fields\\Datastore\\Network_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Network_Datastore.php',
        'Carbon_Fields\\Datastore\\Post_Meta_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Post_Meta_Datastore.php',
        'Carbon_Fields\\Datastore\\Term_Meta_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Term_Meta_Datastore.php',
        'Carbon_Fields\\Datastore\\Theme_Options_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Theme_Options_Datastore.php',
        'Carbon_Fields\\Datastore\\User_Meta_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/User_Meta_Datastore.php',
        'Carbon_Fields\\Datastore\\Widget_Datastore' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Datastore/Widget_Datastore.php',
        'Carbon_Fields\\Event\\Emitter' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Event/Emitter.php',
        'Carbon_Fields\\Event\\Listener' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Event/Listener.php',
        'Carbon_Fields\\Event\\PersistentListener' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Event/PersistentListener.php',
        'Carbon_Fields\\Event\\SingleEventListener' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Event/SingleEventListener.php',
        'Carbon_Fields\\Exception\\Incorrect_Syntax_Exception' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Exception/Incorrect_Syntax_Exception.php',
        'Carbon_Fields\\Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field.php',
        'Carbon_Fields\\Field\\Association_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Association_Field.php',
        'Carbon_Fields\\Field\\Broken_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Broken_Field.php',
        'Carbon_Fields\\Field\\Checkbox_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Checkbox_Field.php',
        'Carbon_Fields\\Field\\Color_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Color_Field.php',
        'Carbon_Fields\\Field\\Complex_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Complex_Field.php',
        'Carbon_Fields\\Field\\Date_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Date_Field.php',
        'Carbon_Fields\\Field\\Date_Time_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Date_Time_Field.php',
        'Carbon_Fields\\Field\\Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Field.php',
        'Carbon_Fields\\Field\\File_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/File_Field.php',
        'Carbon_Fields\\Field\\Footer_Scripts_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Footer_Scripts_Field.php',
        'Carbon_Fields\\Field\\Gravity_Form_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Gravity_Form_Field.php',
        'Carbon_Fields\\Field\\Group_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Group_Field.php',
        'Carbon_Fields\\Field\\Header_Scripts_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Header_Scripts_Field.php',
        'Carbon_Fields\\Field\\Hidden_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Hidden_Field.php',
        'Carbon_Fields\\Field\\Html_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Html_Field.php',
        'Carbon_Fields\\Field\\Image_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Image_Field.php',
        'Carbon_Fields\\Field\\Map_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Map_Field.php',
        'Carbon_Fields\\Field\\Media_Gallery_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Media_Gallery_Field.php',
        'Carbon_Fields\\Field\\Multiselect_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Multiselect_Field.php',
        'Carbon_Fields\\Field\\OEmbed_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Oembed_Field.php',
        'Carbon_Fields\\Field\\Predefined_Options_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Predefined_Options_Field.php',
        'Carbon_Fields\\Field\\Radio_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Radio_Field.php',
        'Carbon_Fields\\Field\\Radio_Image_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Radio_Image_Field.php',
        'Carbon_Fields\\Field\\Rich_Text_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Rich_Text_Field.php',
        'Carbon_Fields\\Field\\Scripts_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Scripts_Field.php',
        'Carbon_Fields\\Field\\Select_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Select_Field.php',
        'Carbon_Fields\\Field\\Separator_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Separator_Field.php',
        'Carbon_Fields\\Field\\Set_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Set_Field.php',
        'Carbon_Fields\\Field\\Sidebar_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Sidebar_Field.php',
        'Carbon_Fields\\Field\\Text_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Text_Field.php',
        'Carbon_Fields\\Field\\Textarea_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Textarea_Field.php',
        'Carbon_Fields\\Field\\Time_Field' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Field/Time_Field.php',
        'Carbon_Fields\\Helper\\Color' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Helper/Color.php',
        'Carbon_Fields\\Helper\\Delimiter' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Helper/Delimiter.php',
        'Carbon_Fields\\Helper\\Helper' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Helper/Helper.php',
        'Carbon_Fields\\Libraries\\Sidebar_Manager\\Sidebar_Manager' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Libraries/Sidebar_Manager/Sidebar_Manager.php',
        'Carbon_Fields\\Loader\\Loader' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Loader/Loader.php',
        'Carbon_Fields\\Pimple\\Container' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Pimple/Container.php',
        'Carbon_Fields\\Pimple\\ServiceProviderInterface' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Pimple/ServiceProviderInterface.php',
        'Carbon_Fields\\Provider\\Container_Condition_Provider' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Provider/Container_Condition_Provider.php',
        'Carbon_Fields\\REST_API\\Decorator' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/REST_API/Decorator.php',
        'Carbon_Fields\\REST_API\\Router' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/REST_API/Router.php',
        'Carbon_Fields\\Service\\Legacy_Storage_Service_v_1_5' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Service/Legacy_Storage_Service_v_1_5.php',
        'Carbon_Fields\\Service\\Meta_Query_Service' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Service/Meta_Query_Service.php',
        'Carbon_Fields\\Service\\REST_API_Service' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Service/REST_API_Service.php',
        'Carbon_Fields\\Service\\Revisions_Service' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Service/Revisions_Service.php',
        'Carbon_Fields\\Service\\Service' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Service/Service.php',
        'Carbon_Fields\\Toolset\\Key_Toolset' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Toolset/Key_Toolset.php',
        'Carbon_Fields\\Toolset\\WP_Toolset' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Toolset/WP_Toolset.php',
        'Carbon_Fields\\Value_Set\\Value_Set' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Value_Set/Value_Set.php',
        'Carbon_Fields\\Walker\\Nav_Menu_Item_Edit_Walker' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Walker/Nav_Menu_Item_Edit_Walker.php',
        'Carbon_Fields\\Widget' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Widget.php',
        'Carbon_Fields\\Widget\\Widget' => __DIR__ . '/..' . '/htmlburger/carbon-fields/core/Widget/Widget.php',
        'ColbyComms\\Collapsible\\CollapsibleShortcode' => __DIR__ . '/..' . '/colbycomms/wp-collapsible/wp/CollapsibleShortcode.php',
        'ColbyComms\\Collapsible\\OptionsPage' => __DIR__ . '/..' . '/colbycomms/wp-collapsible/wp/OptionsPage.php',
        'ColbyComms\\Collapsible\\Plugin' => __DIR__ . '/..' . '/colbycomms/wp-collapsible/wp/Plugin.php',
        'ColbyComms\\Collapsible\\WpFunctions' => __DIR__ . '/..' . '/colbycomms/wp-collapsible/wp/WpFunctions.php',
        'ColbyComms\\HeroicPanel\\Block' => __DIR__ . '/..' . '/colbycomms/heroic-panel/heroic-panel/Block.php',
        'ColbyComms\\HeroicPanel\\HeroicPanel' => __DIR__ . '/..' . '/colbycomms/heroic-panel/heroic-panel/HeroicPanel.php',
        'ColbyComms\\SVG\\SVG' => __DIR__ . '/..' . '/colbycomms/colby-svg/wp/classes/SVG.php',
        'ColbyComms\\SVG\\Shortcode' => __DIR__ . '/..' . '/colbycomms/colby-svg/wp/classes/Shortcode.php',
        'ColbyComms\\Schedules\\Blocks\\DayBlock' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Blocks/DayBlock.php',
        'ColbyComms\\Schedules\\Blocks\\EventBlock' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Blocks/EventBlock.php',
        'ColbyComms\\Schedules\\Blocks\\ScheduleBlock' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Blocks/ScheduleBlock.php',
        'ColbyComms\\Schedules\\Blocks\\SchedulePickerBlock' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Blocks/SchedulePickerBlock.php',
        'ColbyComms\\Schedules\\Event\\Event' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Event/Event.php',
        'ColbyComms\\Schedules\\Event\\EventMeta' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Event/EventMeta.php',
        'ColbyComms\\Schedules\\Schedule\\Schedule' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Schedule/Schedule.php',
        'ColbyComms\\Schedules\\Schedule\\ScheduleCategoryArchive' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Schedule/ScheduleCategoryArchive.php',
        'ColbyComms\\Schedules\\Schedule\\ScheduleMeta' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Schedule/ScheduleMeta.php',
        'ColbyComms\\Schedules\\Schedules' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Schedules.php',
        'ColbyComms\\Schedules\\ThemeOptions' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/ThemeOptions.php',
        'ColbyComms\\Schedules\\Utils\\WpFunctions' => __DIR__ . '/..' . '/colbycomms/wp-schedule/wp-schedule/Utils/WpFunctions.php',
        'ColbyComms\\TwentyEighteen\\Editor' => __DIR__ . '/../..' . '/wp-autoload/classes/Editor.php',
        'ColbyComms\\TwentyEighteen\\Navbar' => __DIR__ . '/../..' . '/wp-autoload/classes/Navbar.php',
        'ColbyComms\\TwentyEighteen\\PageHeader' => __DIR__ . '/../..' . '/wp-autoload/classes/PageHeader.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\Button' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/Button.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\Catalog' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/Catalog.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\ColbyDNLogos' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/ColbyDNLogos.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\Column' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/Column.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\NoAutoP' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/NoAutoP.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\Section' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/Section.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\SiteSearchForm' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/SiteSearchForm.php',
        'ColbyComms\\TwentyEighteen\\Shortcodes\\Theme' => __DIR__ . '/../..' . '/wp-autoload/classes/Shortcodes/Theme.php',
        'ColbyComms\\TwentyEighteen\\ThemeOptions' => __DIR__ . '/../..' . '/wp-autoload/classes/ThemeOptions.php',
        'ColbyComms\\TwentyEighteen\\TwentyEighteen' => __DIR__ . '/../..' . '/wp-autoload/classes/TwentyEighteen.php',
        'ColbyComms\\TwentyEighteen\\WpFunctions' => __DIR__ . '/../..' . '/wp-autoload/classes/WpFunctions.php',
        'ColbyComms\\WhosComing\\DataFetcher' => __DIR__ . '/../..' . '/wp-content/plugins/whos-coming/whos-coming/DataFetcher.php',
        'ColbyComms\\WhosComing\\ThemeOptions' => __DIR__ . '/../..' . '/wp-content/plugins/whos-coming/whos-coming/ThemeOptions.php',
        'ColbyComms\\WhosComing\\WhosComing' => __DIR__ . '/../..' . '/wp-content/plugins/whos-coming/whos-coming/WhosComing.php',
        'ColbyComms\\WhosComing\\WpFunctions' => __DIR__ . '/../..' . '/wp-content/plugins/whos-coming/whos-coming/WpFunctions.php',
        'Composer\\Installers\\AglInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AglInstaller.php',
        'Composer\\Installers\\AimeosInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AimeosInstaller.php',
        'Composer\\Installers\\AnnotateCmsInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AnnotateCmsInstaller.php',
        'Composer\\Installers\\AsgardInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AsgardInstaller.php',
        'Composer\\Installers\\AttogramInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AttogramInstaller.php',
        'Composer\\Installers\\BaseInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/BaseInstaller.php',
        'Composer\\Installers\\BitrixInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/BitrixInstaller.php',
        'Composer\\Installers\\BonefishInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/BonefishInstaller.php',
        'Composer\\Installers\\CakePHPInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CakePHPInstaller.php',
        'Composer\\Installers\\ChefInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ChefInstaller.php',
        'Composer\\Installers\\CiviCrmInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CiviCrmInstaller.php',
        'Composer\\Installers\\ClanCatsFrameworkInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ClanCatsFrameworkInstaller.php',
        'Composer\\Installers\\CockpitInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CockpitInstaller.php',
        'Composer\\Installers\\CodeIgniterInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CodeIgniterInstaller.php',
        'Composer\\Installers\\Concrete5Installer' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Concrete5Installer.php',
        'Composer\\Installers\\CraftInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CraftInstaller.php',
        'Composer\\Installers\\CroogoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CroogoInstaller.php',
        'Composer\\Installers\\DecibelInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DecibelInstaller.php',
        'Composer\\Installers\\DokuWikiInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DokuWikiInstaller.php',
        'Composer\\Installers\\DolibarrInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DolibarrInstaller.php',
        'Composer\\Installers\\DrupalInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DrupalInstaller.php',
        'Composer\\Installers\\ElggInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ElggInstaller.php',
        'Composer\\Installers\\EliasisInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/EliasisInstaller.php',
        'Composer\\Installers\\ExpressionEngineInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ExpressionEngineInstaller.php',
        'Composer\\Installers\\EzPlatformInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/EzPlatformInstaller.php',
        'Composer\\Installers\\FuelInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/FuelInstaller.php',
        'Composer\\Installers\\FuelphpInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/FuelphpInstaller.php',
        'Composer\\Installers\\GravInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/GravInstaller.php',
        'Composer\\Installers\\HuradInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/HuradInstaller.php',
        'Composer\\Installers\\ImageCMSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ImageCMSInstaller.php',
        'Composer\\Installers\\Installer' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Installer.php',
        'Composer\\Installers\\ItopInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ItopInstaller.php',
        'Composer\\Installers\\JoomlaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/JoomlaInstaller.php',
        'Composer\\Installers\\KanboardInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KanboardInstaller.php',
        'Composer\\Installers\\KirbyInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KirbyInstaller.php',
        'Composer\\Installers\\KodiCMSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KodiCMSInstaller.php',
        'Composer\\Installers\\KohanaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KohanaInstaller.php',
        'Composer\\Installers\\LanManagementSystemInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LanManagementSystemInstaller.php',
        'Composer\\Installers\\LaravelInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LaravelInstaller.php',
        'Composer\\Installers\\LavaLiteInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LavaLiteInstaller.php',
        'Composer\\Installers\\LithiumInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LithiumInstaller.php',
        'Composer\\Installers\\MODULEWorkInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MODULEWorkInstaller.php',
        'Composer\\Installers\\MODXEvoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MODXEvoInstaller.php',
        'Composer\\Installers\\MagentoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MagentoInstaller.php',
        'Composer\\Installers\\MajimaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MajimaInstaller.php',
        'Composer\\Installers\\MakoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MakoInstaller.php',
        'Composer\\Installers\\MauticInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MauticInstaller.php',
        'Composer\\Installers\\MayaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MayaInstaller.php',
        'Composer\\Installers\\MediaWikiInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MediaWikiInstaller.php',
        'Composer\\Installers\\MicroweberInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MicroweberInstaller.php',
        'Composer\\Installers\\ModxInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ModxInstaller.php',
        'Composer\\Installers\\MoodleInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MoodleInstaller.php',
        'Composer\\Installers\\OctoberInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OctoberInstaller.php',
        'Composer\\Installers\\OntoWikiInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OntoWikiInstaller.php',
        'Composer\\Installers\\OsclassInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OsclassInstaller.php',
        'Composer\\Installers\\OxidInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OxidInstaller.php',
        'Composer\\Installers\\PPIInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PPIInstaller.php',
        'Composer\\Installers\\PhiftyInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PhiftyInstaller.php',
        'Composer\\Installers\\PhpBBInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PhpBBInstaller.php',
        'Composer\\Installers\\PimcoreInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PimcoreInstaller.php',
        'Composer\\Installers\\PiwikInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PiwikInstaller.php',
        'Composer\\Installers\\PlentymarketsInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PlentymarketsInstaller.php',
        'Composer\\Installers\\Plugin' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Plugin.php',
        'Composer\\Installers\\PortoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PortoInstaller.php',
        'Composer\\Installers\\PrestashopInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PrestashopInstaller.php',
        'Composer\\Installers\\PuppetInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PuppetInstaller.php',
        'Composer\\Installers\\PxcmsInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PxcmsInstaller.php',
        'Composer\\Installers\\RadPHPInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/RadPHPInstaller.php',
        'Composer\\Installers\\ReIndexInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ReIndexInstaller.php',
        'Composer\\Installers\\RedaxoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/RedaxoInstaller.php',
        'Composer\\Installers\\RoundcubeInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/RoundcubeInstaller.php',
        'Composer\\Installers\\SMFInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/SMFInstaller.php',
        'Composer\\Installers\\ShopwareInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ShopwareInstaller.php',
        'Composer\\Installers\\SilverStripeInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/SilverStripeInstaller.php',
        'Composer\\Installers\\SiteDirectInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/SiteDirectInstaller.php',
        'Composer\\Installers\\SyDESInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/SyDESInstaller.php',
        'Composer\\Installers\\Symfony1Installer' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Symfony1Installer.php',
        'Composer\\Installers\\TYPO3CmsInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TYPO3CmsInstaller.php',
        'Composer\\Installers\\TYPO3FlowInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TYPO3FlowInstaller.php',
        'Composer\\Installers\\TheliaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TheliaInstaller.php',
        'Composer\\Installers\\TuskInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TuskInstaller.php',
        'Composer\\Installers\\UserFrostingInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/UserFrostingInstaller.php',
        'Composer\\Installers\\VanillaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/VanillaInstaller.php',
        'Composer\\Installers\\VgmcpInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/VgmcpInstaller.php',
        'Composer\\Installers\\WHMCSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/WHMCSInstaller.php',
        'Composer\\Installers\\WolfCMSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/WolfCMSInstaller.php',
        'Composer\\Installers\\WordPressInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/WordPressInstaller.php',
        'Composer\\Installers\\YawikInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/YawikInstaller.php',
        'Composer\\Installers\\ZendInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ZendInstaller.php',
        'Composer\\Installers\\ZikulaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ZikulaInstaller.php',
        'VTDE\\Editor' => __DIR__ . '/../..' . '/wp-content/plugins/visual-term-description-editor/php/class-editor.php',
        'VTDE\\Plugin' => __DIR__ . '/../..' . '/wp-content/plugins/visual-term-description-editor/php/class-plugin.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite4bf1495e28a969bde9be17284ccdb4d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite4bf1495e28a969bde9be17284ccdb4d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite4bf1495e28a969bde9be17284ccdb4d::$classMap;

        }, null, ClassLoader::class);
    }
}
