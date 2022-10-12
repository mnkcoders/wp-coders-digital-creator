<?php namespace CODERS\Framework;

defined('ABSPATH') or die;

/**
 * 
 */
class Setup extends Installer{
    /**
     * Media Table
     * @param string $prefix
     * @param string $collation
     * @return String
     */
    private final function sql_media_table( $prefix , $collation ){

        return sprintf("CREATE TABLE `%scoders_digitor_media` (
        `id` varchar(32) NOT NULL,
        `parent_id` varchar(32) NOT NULL,
        `title` varchar(128) NOT NULL,
        `content_type` varchar(8) NOT NULL,
        `status` tinyint(1) NOT NULL,
        `date_created` datetime NOT NULL,
        `date_updated` datetime NOT NULL,
        PRIMARY KEY (`id`)
        ) %s", $prefix, $collation);
    }
    /**
     * Posts Table
     * @param string $prefix
     * @param string $collation
     * @return String
     */
    private final function sql_posts_table( $prefix , $collation ){

        return sprintf("CREATE TABLE `%scoders_digitor_posts` (
            `id` varchar(32) NOT NULL,
            `title` varchar(64) NOT NULL,
            `content` text NOT NULL,
            `thumbnail` int(11) NOT NULL,
            `parent_id` varchar(32) NOT NULL,
            `type` varchar(8) NOT NULL,
            `status` tinyint(1) NOT NULL,
            `acl` varchar(32) NOT NULL,
            `order_id` int(11) NOT NULL DEFAULT '0',
            `date_created` datetime NOT NULL,
            `date_updated` datetime NOT NULL,
            PRIMARY KEY (`id`)
           ) %s", $prefix, $collation);
    }
    /**
     * Accounts Table
     * @param string $prefix
     * @param string $collation
     * @return String
     */
    private final function sql_accounts_table( $prefix , $collation ){

        return sprintf('CREATE TABLE `%scoders_digitor_accounts` (
        `id` int(11) NOT NULL,
        `email` varchar(64) NOT NULL,
        `alias` varchar(32) NOT NULL,
        `status` tinyint(1) NOT NULL,
        `date_created` datetime NOT NULL,
        `date_modified` datetime NOT NULL,
        PRIMARY KEY (`id`)
        ) %s', $prefix, $collation);
    }
    /**
     * Roles Table
     * @param string $prefix
     * @param string $collation
     * @return String
     */
    private final function sql_roles_table( $prefix , $collation ){

        return sprintf('CREATE TABLE `%scoders_digitor_roles` (
        `id` varchar(16) NOT NULL,
        `name` varchar(64) NOT NULL,
        `description` text NOT NULL,
        PRIMARY KEY (`id`)
        ) %s', $prefix, $collation);
    }
    /**
     * Subscriptions Table
     * @param string $prefix
     * @param string $collation
     * @return String
     */
    private final function sql_subscriptions_table( $prefix , $collation ){

        return sprintf('CREATE TABLE `%scoders_digitor_subscriptions` (
        `id` int(11) NOT NULL,
        `user_id` int(11) NOT NULL,
        `role_id` varchar(16) NOT NULL,
        `status` tinyint(1) NOT NULL,
        `auto_renew` tinyint(1) NOT NULL,
        `date_start` datetime NOT NULL,
        `date_end` datetime NOT NULL,
        PRIMARY KEY (`id`)
        ) %s', $prefix, $collation);
    }
    /**
     * Sessions Table
     * @param string $prefix
     * @param string $collation
     * @return String
     */
    private final function sql_sessions_table( $prefix , $collation ){

        return sprintf('CREATE TABLE `%scoders_digitor_sessions` (
        `id` varchar(64) NOT NULL,
        `user_id` int(11) NOT NULL,
        `status` tinyint(1) NOT NULL,
        `timespan` int(11) NOT NULL,
        `date_created` datetime NOT NULL,
        `date_updated` datetime NOT NULL,
        KEY `id` (`id`)
        ) %s', $prefix, $collation);
    }
    
    /**
     * 
     * @global \wpdb $wpdb
     * @return boolean
     */
    public final function install() {
        /**
         * @var \wpdb Database Connector
         */
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();
        
        $accounts_table = $this->sql_accounts_table($wpdb->prefix, $charset_collate);
        $roles_table = $this->sql_roles_table($wpdb->prefix, $charset_collate);
        $subscriptions_table = $this->sql_subscriptions_table($wpdb->prefix, $charset_collate);
        $sessions_table = $this->sql_sessions_table($wpdb->prefix, $charset_collate);
        $media_table = $this->sql_media_table($wpdb->prefix, $charset_collate);
        $posts_table = $this->sql_posts_table($wpdb->prefix, $charset_collate);
        
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        
        dbDelta( $accounts_table );
        dbDelta( $roles_table );
        dbDelta( $subscriptions_table );
        dbDelta( $sessions_table);
        dbDelta( $media_table);
        dbDelta( $posts_table);
        
        return parent::install();
    }
    /**
     * @return boolean
     * @global \wpdb
     */
    public final function uninstall() {
        
        /**
         * @var \wpdb
         */
        global $wpdb;

        $drop_accounts = sprintf('DROP TABLE IF EXISTS %scoders_digitor_accounts',$wpdb->prefix);
        $drop_roles = sprintf('DROP TABLE IF EXISTS %scoders_digitor_roles',$wpdb->prefix);
        $drop_subscriptions = sprintf('DROP TABLE IF EXISTS %scoders_digitor_subscriptions',$wpdb->prefix);
        $drop_sessions = sprintf('DROP TABLE IF EXISTS %scoders_digitor_sessions',$wpdb->prefix);
        $drop_posts = sprintf('DROP TABLE IF EXISTS %scoders_digitor_posts',$wpdb->prefix);
        $drop_media = sprintf('DROP TABLE IF EXISTS %scoders_digitor_media',$wpdb->prefix);

        $wpdb->query( $drop_accounts);
        $wpdb->query( $drop_roles);
        $wpdb->query( $drop_subscriptions);
        $wpdb->query( $drop_sessions);
        $wpdb->query( $drop_posts);
        $wpdb->query( $drop_media);

            //delete_option("my_plugin_db_version");

        return parent::uninstall();
    }
}


