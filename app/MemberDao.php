<?php


class MemberDao{
    public static function getMemberByLoginId(string $loginId): array{
        // 배열을 리턴한다.
        $sql = "
            SELECT *
            FROM member
            WHERE loginId = '{$loginId}'
        ";
        return DB__getDBRow($sql);
    }



}
